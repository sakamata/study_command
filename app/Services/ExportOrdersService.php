<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;

use Generator; // これじゃなくなった
// 6.0 で変更となった
// https://readouble.com/laravel/6.0/ja/upgrade.html
// cursorメソッドがGeneratorインスタンスの代わりに、
// Illuminate\Support\LazyCollectionインスタンスを返すようにしました。
// LazyCollectionもジェネレータ同様に繰り返し処理できます。
use Illuminate\Support\LazyCollection; // 6.0ではこれが正解

use Illuminate\Database\Connection;

final class ExportOrdersService
{
    /** @var Connection */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * 対象日の購入情報を取得
     *
     * @param Carbon $date
     * @return LazyCollection
     */
    public function findOrders(Carbon $date): LazyCollection
    {
        return $this->connection
            ->table('orders')
            ->join('order_details', 'orders.order_code', '=', 'order_details.order_code')
            ->select([
                'orders.order_code',
                'orders.order_date',
                'orders.total_price',
                'orders.total_quantity',
                'orders.customer_name',
                'orders.customer_email',
                'orders.destination_name',
                'orders.destination_zip',
                'orders.destination_prefecture',
                'orders.destination_address',
                'orders.destination_tel',
                'order_details.*',
            ])
            ->where('order_date', '>=', $date->toDateString())
            ->where('order_date', '<', $date->copy()->addDay()->toDateString())
            ->orderBy('order_date')
            ->orderBy('orders.id')
            ->orderBy('order_details.detail_no')
            ->cursor();  // ここがポイント！ cursor は呼び出し時点でレコードの読み込みはしない

            // https://localdisk.hatenablog.com/entry/2016/07/20/173208
            // cursor メソッドを使っています。これは 5.2.33 から追加されました*1。
            // 内部でジェネレータを使っているのでメモリ不足で死ななくて最高です。
    }
}

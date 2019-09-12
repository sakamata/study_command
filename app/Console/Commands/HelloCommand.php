<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    // 通常のコマンド
    // protected $signature = 'hello:class';

    // 引数必須の例
    // protected $signature = 'hello:class {hoge}';

    // オプションを任意で付与出来る例
    protected $signature = 'hello:class {--hoge}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンド(クラスで実装)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 通常のコマンドの例
        // $this->comment('Hello class command!');

        // 引数（必須）の例
        $param = $this->argument('hoge');
        // $this->comment('Hello class command! Param => ' . ($param));

        // オプションを任意で付与出来る例
        $switch = $this->option('hoge');
        $this->comment('Hello switch class command! Param => ' . ($switch ? 'ON' : 'OFF'));

    }
}

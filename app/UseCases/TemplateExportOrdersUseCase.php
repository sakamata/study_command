<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Services\ExportOrdersService;
use Carbon\Carbon;

final class TemplateExportOrdersUseCase
{
    /**
     * @param Carbon $targetDate
     * @return string
     */
    public function run(Carbon $targetDate): string
    {
        return $targetDate->format('Y-m-d') . 'の購入情報';
    }
}

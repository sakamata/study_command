<?php

namespace App\Console\Commands;

use App\UseCases\TemplateExportOrdersUseCase;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExportOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-orders';

    /** @var TemplateExportOrdersUseCase */
    private $useCase;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '購入情報を出力する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TemplateExportOrdersUseCase $useCase)
    {
        parent::__construct();

        $this->useCase = $useCase;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tsv = $this->useCase->run(Carbon::today());
        echo $tsv;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class HelloOptionParamCommand extends Command
{
    /**
     * The name and signature of the console command.
     * php artisan hello:option --param
     * php artisan hello:option --param=1 --param=2
     * @var string
     */
    protected $signature = 'hello:option {--param}';
    // protected $signature = 'hello:option {--param=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンド(引数オプション)';

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
        $param = $this->option('param');
        $this->comment('Hello Option param  => ' . ($param ? '有' : '無'));
        // $this->comment('Hello Option param  => ' . ($param[0] ? '有' : '無'). $param[1]);

        log::debug(print_r('command HelloOptionParamCommand run!!',1));
    }
}

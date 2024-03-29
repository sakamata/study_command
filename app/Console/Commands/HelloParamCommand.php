<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloParamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:param {param}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンド(引数必須)';

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
        $param = $this->argument('param');
        $this->comment('Hello param command! Param => ' . $param);
    }
}

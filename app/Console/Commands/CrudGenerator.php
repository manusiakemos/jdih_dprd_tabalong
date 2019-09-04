<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {ClassName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Crud Model, Controller and Resources';

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
        $className = $this->argument('ClassName', '-m');
        Artisan::call('make:model Model/'. $className);
        Artisan::call('make:controller '. $className.'Controller -r');
        Artisan::call('make:resource '. $className.'Resource');
    }
}

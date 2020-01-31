<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FluxbbFakeMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fluxbb:fake-migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake migration table in existing forum database';

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
        if (Schema::hasTable('migrations')) {
            $this->error('Table migrations already exists');
            return 1;
        }

        Schema::create('migrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('migration', 255);
            $table->integer('batch');
        });

        $files = array_map(
            function ($file) {
                return [
                    'migration' => basename($file, '.php'),
                    'batch' => 1
                ];
            },
            glob(database_path('migrations/*.php'))
        );

        DB::table('migrations')->insert($files);

        $this->info('All done. ' . count($files) . ' records are in migrations table.');
    }
}

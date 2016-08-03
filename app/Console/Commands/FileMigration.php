<?php

namespace DlBay\Console\Commands;

use Illuminate\Console\Command;
use DlBay\Helper\MigrationHelper;

class FileMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing files';

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
        MigrationHelper::MigrateExistingFiles();
    }
}

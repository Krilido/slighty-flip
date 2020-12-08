<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Disbursement;

class SyncAllDisburse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'disburse:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'function for sync all disburse';

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
     * @return int
     */
    public function handle()
    {
        Disbursement::sync_all();
    }
}

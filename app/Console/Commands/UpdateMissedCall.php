<?php

namespace App\Console\Commands;

use App\IncommingLeads;
use Illuminate\Console\Command;

class UpdateMissedCall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'missedCall:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $incommingLead = IncommingLeads::where('seen',1)->get();
        foreach ($incommingLead as $lead){
            $lead->active =0;
            $lead->save();
        }
    }
}

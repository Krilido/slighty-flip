<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Model\Disbursement;
use App\API\FlipApi;
use Log;
use Carbon\Carbon;

class syncDataDisbursment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = Disbursement::find($this->id);
        if (!empty($data)) {
            try {
                if ($data->status == Disbursement::INIT) {
                    $return = FlipApi::createRecord($data);
                    if (!empty($return)) {
                        $return = json_decode($return,true);
                        $data->id_api = $return["id"];
                        $data->status = $return["status"];
                        $data->timestamp = $return["timestamp"];
                        $data->beneficiary_name = $return["beneficiary_name"];
                        $data->receipt = $return["receipt"];
                        $data->time_served = $return["time_served"];
                        $data->fee = $return["fee"];
                        $data->updated_at = Carbon::now();
                        $data->save();                        
                    }
                } else{
                    $return = FlipApi::sync_one($data->id_api);
                    if (!empty($return)) {
                        $return = json_decode($return,true);
                        $data->status = $return["status"];
                        $data->receipt = $return["receipt"];
                        $data->time_served = $return["time_served"];
                        $data->updated_at = Carbon::now();
                        $data->save();    
                    }
                    
                }
            } catch (\Throwable $th) {
                dd($th);
                Log::info($th);
            }
        }
    }
}

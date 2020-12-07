<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Queue;

class Disbursement extends Model
{
    const INIT = "INIT";
    const PENDING = "PENDING";
    const SUCCESS = "SUCCESS";

    public static function sync_all()
    {
        $data = Disbursement::select('id')->where('status','!=',Disbursement::SUCCESS)->get();
        foreach ($data as $key => $value) {
            Queue::push(new \App\Jobs\syncDataDisbursment($value->id));
        }
    }
}

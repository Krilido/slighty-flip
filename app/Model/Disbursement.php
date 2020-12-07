<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    const INIT = "INIT";
    const PENDING = "PENDING";
    const SUCCESS = "SUCCESS";

    public static function sync_all()
    {
        $data = Disbursement::where('status','!=',Disbursement::SUCCESS)->get();
        
    }
}

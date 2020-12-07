<?php

namespace App\API;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Libraries\Utility;
use Illuminate\Support\Facades\Config;

class FlipApi
{
    private $add_record = "disburse";
    private $get_list = "disburse/";
    

    public static function createRecord($data)
    {
        
        $postfields = array(
            'bank_code'         => $data->bank_code,
            'account_number'    => $data->account_number,
            'amount'            => $data->amount,
            'remark'            => $data->remark,
        );
        
        $postfields = http_build_query($postfields);

        $header = array('Content-Type: application/x-www-form-urlencoded');
        $url = env("URL_FLIP_API", null);
        if (empty($url)) {
            return null;
        }
        $fa = new FlipApi;

        $url = $url.$fa->add_record;
        $auth = env("API_KEY", null);
        if (empty($auth)) {
            return null;
        }

        
        $util = New Utility();
        $result = $util->sendToExternalFix($postfields,$url,Utility::METHOD_POST,$header,$auth);
        return $result;

    }
}


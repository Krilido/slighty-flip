<?php

namespace App\Libraries;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\Config;


class Utility
{    

    

    const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';
	const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
        
    public function sendToExternalFix($data,$url,$method = "POST",$headers = null,$auth = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' ));
        switch( strtoupper($method )) {
            case self::METHOD_GET:
                curl_setopt( $ch, CURLOPT_HTTPGET, true );	
                break;

            case self::METHOD_POST:
                curl_setopt( $ch, CURLOPT_POST, true );
                break;

            case self::METHOD_PUT:
                $http_header[ ] = 'Content-Length: ' . strlen( $data );
                break;

            case self::METHOD_DELETE:
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
        }	
        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if (!empty($auth)) {
            curl_setopt($ch, CURLOPT_USERPWD, $auth);
        }
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
}

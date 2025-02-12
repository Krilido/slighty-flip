<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Disbursement;
use App\API\FlipApi;
use Validator;
use Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DisbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Disbursement::orderBy('created_at','DESC'); 
        $data_send['datas'] = $data->paginate(10);
        return view('disbursement.index',$data_send);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disbursement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'bank_code' => 'required',
            'account_number' => 'required',
            'remark' => 'required',
        ];
        $msg = [
            'required' => ':attribute tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules,$msg);
        if (!$validator->passes()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $disburs                    = new Disbursement;
            $disburs->amount            = $request->amount;
            $disburs->bank_code         = $request->bank_code;
            $disburs->account_number    = $request->account_number;
            $disburs->remark            = $request->remark;
            $disburs->status            = Disbursement::INIT;
            $disburs->created_at        = Carbon::now();
            $disburs->save();

            if ($disburs) {
                DB::commit();
                try {
                    $return = FlipApi::createRecord($disburs);
                    if (empty($return)) {
                        return redirect()->route('disbursement')->with('create_success',true);
                    }
                    $return = json_decode($return,true);
                    $disburs->id_api = $return["id"];
                    $disburs->status = $return["status"];
                    $disburs->timestamp = $return["timestamp"];
                    $disburs->beneficiary_name = $return["beneficiary_name"];
                    $disburs->receipt = $return["receipt"];
                    $disburs->time_served = $return["time_served"];
                    $disburs->fee = $return["fee"];
                    $disburs->save();
                    
                } catch (\Throwable $th) {
                    Log::info($th);
                }
                return redirect()->route('disbursement')->with('create_success',true);
            } else{
                return redirect()->route('disbursement')->with('create_failed',true)->withInput();
            }

        } catch (\Throwable $th) {
            Log::info($th);dd($th);
            DB::rollback();
            return redirect()->route('disbursement')->with('create_failed',true)->withInput();
        }
    }

    public function store_api(Request $request)
    {
        $rules = [
            'amount' => 'required|numeric',
            'bank_code' => 'required',
            'account_number' => 'required',
            'remark' => 'required',
        ];
        $msg = [
            'required' => ':attribute tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules,$msg);
        if (!$validator->passes()) {
            return response()->json(['code' => 400,'error' => "error in validation",'message' => $validator->errors()],200);
        }
        try {
            DB::beginTransaction();
            $disburs                    = new Disbursement;
            $disburs->amount            = $request->amount;
            $disburs->bank_code         = $request->bank_code;
            $disburs->account_number    = $request->account_number;
            $disburs->remark            = $request->remark;
            $disburs->status            = Disbursement::INIT;
            $disburs->created_at        = Carbon::now();
            $disburs->save();

            if ($disburs) {
                DB::commit();
                try {
                    $return = FlipApi::createRecord($disburs);
                    if (empty($return)) {
                        return response()->json(['code' => 200,'data' => $disburs,'message' => 'success with pending sync.'],200);
                    }
                    $return = json_decode($return,true);
                    $disburs->id_api = $return["id"];
                    $disburs->status = $return["status"];
                    $disburs->timestamp = $return["timestamp"];
                    $disburs->beneficiary_name = $return["beneficiary_name"];
                    $disburs->receipt = $return["receipt"];
                    $disburs->time_served = $return["time_served"];
                    $disburs->fee = $return["fee"];
                    $disburs->save();
                    
                } catch (\Throwable $th) {
                    Log::info($th);
                }
                return response()->json(['code' => 200,'data' => $disburs,'message' => 'success create and sync data.'],200);
            } else{
                return response()->json(['code' => 400,'error' => "create failed",'message' => 'failed create data.'],200);
            }

        } catch (\Throwable $th) {
            Log::info($th);dd($th);
            DB::rollback();
            return response()->json(['code' => 400,'error' => "create failed",'message' => 'failed create data.'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Disbursement::find($id);
        return view('disbursement.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sync($id)
    {
        try {
            $data = Disbursement::find($id);
            if (empty($data)) {
                return redirect()->route('disbursement')->with('sync_failed',true);
            }
            if ($data->status == Disbursement::SUCCESS) {
                return redirect()->route('disbursement')->with('sync_success',true);
            } elseif ($data->status == Disbursement::INIT) {
                $return = FlipApi::createRecord($data);
                if (empty($return)) {
                    return redirect()->route('disbursement')->with('create_success',true);
                }
                $return = json_decode($return,true);
                $data->id_api = $return["id"];
                $data->status = $return["status"];
                $data->timestamp = $return["timestamp"];
                $data->beneficiary_name = $return["beneficiary_name"];
                $data->receipt = $return["receipt"];
                $data->time_served = $return["time_served"];
                $data->fee = $return["fee"];
                $data->save();
                if ($data) {
                    return redirect()->route('disbursement')->with('sync_success',true);
                } else{
                    return redirect()->route('disbursement')->with('sync_failed',true);
                }
            } elseif($data->status == Disbursement::PENDING){
                $return = FlipApi::sync_one($data->id_api);
                if (empty($return)) {
                    return redirect()->route('disbursement')->with('sync_failed',true);
                }
                $return = json_decode($return,true);
                $data->status = $return["status"];
                $data->receipt = $return["receipt"];
                $data->time_served = $return["time_served"];
                $data->updated_at = Carbon::now();
                $data->save();
                if ($data) {
                    return redirect()->route('disbursement')->with('sync_success',true);
                } else{
                    return redirect()->route('disbursement')->with('sync_failed',true);
                }
            }
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect()->route('disbursement')->with('sync_failed',true);
        }
    }

    public function sync_api(Request $request)
    {
        try {
            $data = Disbursement::find($request->id);
            if (empty($data)) {
                return response()->json(['code' => 404,'error' => "sync failed",'message' => 'data not found.'],200);
            }
            if ($data->status == Disbursement::SUCCESS) {
                return response()->json(['code' => 200,'data' => $data,'message' => 'sync success.'],200);
            } elseif ($data->status == Disbursement::INIT) {
                $return = FlipApi::createRecord($data);
                if (empty($return)) {
                    return response()->json(['code' => 400,'error' => "sync failed",'message' => 'response API null.'],200);
                }
                $return = json_decode($return,true);
                $data->id_api = $return["id"];
                $data->status = $return["status"];
                $data->timestamp = $return["timestamp"];
                $data->beneficiary_name = $return["beneficiary_name"];
                $data->receipt = $return["receipt"];
                $data->time_served = $return["time_served"];
                $data->fee = $return["fee"];
                $data->save();
                if ($data) {
                    return response()->json(['code' => 200,'data' => $data,'message' => 'sync success.'],200);
                } else{
                    return response()->json(['code' => 400,'error' => "sync failed",'message' => 'save data error.'],200);
                }
            } else{
                $return = FlipApi::sync_one($data->id_api);
                if (empty($return)) {
                    return response()->json(['code' => 400,'error' => "sync failed",'message' => 'response API null.'],200);
                }
                $return = json_decode($return,true);
                $data->status = $return["status"];
                $data->receipt = $return["receipt"];
                $data->time_served = $return["time_served"];
                $data->updated_at = Carbon::now();
                $data->save();
                if ($data) {
                    return response()->json(['code' => 200,'data' => $data,'message' => 'sync success.'],200);
                } else{
                    return response()->json(['code' => 400,'error' => "sync failed",'message' => 'save data error.'],200);
                }
            }
        } catch (\Throwable $th) {
            Log::info($th);
            return response()->json(['code' => 400,'error' => "sync failed",'message' => 'save data error, please contact your admin.'],200);
        }
    }

    public function sync_manual()
    {
        Disbursement::sync_all();
        return redirect()->route('disbursement')->with('sync_success',true);
        
    }
}

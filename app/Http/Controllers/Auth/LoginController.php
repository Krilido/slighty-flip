<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
            
        ];
        $msg = [
            'required' => ':attribute tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules,$msg);
        if (!$validator->passes()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            
            $user = User::where('email',$request->email)->first();
            if (empty($user)) {
                return redirect()->route('/')->with('login_failed',true)->withInput();
            } else{
                $password = Hash::check($request->password,$user->password);
                if ($password) {
                    return redirect()->route('dashboard');
                } else{
                    return redirect()->route('/')->with('login_failed',true)->withInput();
                }
            }

        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('login')->with('login_failed',true)->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;

class IndexController extends CommonController
{
    public function index(){
        return view('admin.index');
    }

    public function info(){
        return view('admin.info');
    }

    //更改超级管理员密码
    public function pass(){
        if($input = Input::all()){

            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];
            $validator = Validator::make($input,$rules);

            if($validator->passes()){
                $user = User::first();
                $_password=Crypt::decrypt($user->user_pass);
                if($input['password_o']==$_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','Password changed!');
                }else{
                    return back()->with('errors','Original password wrong!');
                }
            }else{
                return back()->withErrors($validator);
            }

        }else{
            return view('admin.pass');
        }
    }
}

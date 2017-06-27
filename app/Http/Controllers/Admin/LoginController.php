<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if ($input = Input::all()) {
            $code = new \Code;
            $_code = $code->get(); //得到验证码
            //判断验证码，密码，用户名是否正确
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', 'Verify Code Wrong');
            }
            $user = User::first();//下面判断用户名和密码
            if ($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']) {
                return back()->with('msg', 'Please check your username and password');
            }
            session(['user' => $user]);
            //dd(session('user'));
            return redirect('admin');
        } else {
            //dd($_SERVER);
//            session(['user' => null]);
            return view('admin.login');
        }
    }

    public function quit(){
        session(['user' => null]);
        return redirect('admin/login');
    }

    public function code(){
        $code = new \Code;
        $code ->make();
    }

}

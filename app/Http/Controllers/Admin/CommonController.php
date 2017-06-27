<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class CommonController extends Controller
{
    //picture upload图片上传
    public function upload(){
        $file = Input::file('Filedata');
        if($file -> isValid()){
            $entension = $file ->getClientOriginalExtension(); //上传文件的后缀
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension; //上传文件重新命名(根据时间来重命名)
            $path = $file -> move(base_path().'/uploads',$newName); //移动上传文件到指定文件夹
            $filepath = 'newblog/uploads/'.$newName; //$filepath显示文件路径
            return $filepath;
        }
    }
}

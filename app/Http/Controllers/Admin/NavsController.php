<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    //get.admin/navs
    public function index(){
        $data = Navs::orderBy('nav_order','asc')->get();
        return view('admin.navs.index',compact('data'));
    }

    public function changeOrder(){
        $input = Input::all();
        $navs = Navs::find($input['nav_id']);
        $navs->nav_order = $input['nav_order'];
        $re = $navs->update();

        if($re){
            $data = [
                'status' => 0,
                'msg' => 'Navigation order update successful!'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Navigation order update failed!'
            ];
        }
        return $data;
    }


    public function show(){

    }

    public function create(){
        return view('admin/navs/add');
    }

    public function store(){
        $input = Input::except('_token');
        $rules = [
            'nav_name' => 'required',
            'nav_url' => 'required',
        ];
        $message = [
            'nav_name.required'=>'Navigation name is required. Please Filled up the category name',
            'nav_url.required'=>'Navigation URL is required. Please Filled up the category name'
        ];
        $validator = Validator::make($input, $rules,$message);
        if ($validator->passes()) {
            $re = Navs::create($input);
            if($re){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','Unknown error, please try again later');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //GET|HEAD                       | admin/navs/{navs}/edit | navs.edit 编辑链接
    public function edit($nav_id){
        $field = Navs::find($nav_id);
        return view('admin.navs.edit', compact('field'));
    }


    //PUT|PATCH                      | admin/navs/{navs}      | nav.update 更新链接
    public function update($nav_id){
        $input = Input::except('_token','_method');
        $re = Navs::where('nav_id',$nav_id)->update($input);
        if($re){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','Update failed, please try later');
        }
    }
    
    //DELETE                         | admin/navs/{navs}      | navs.destroy 删除链接
    public function destroy($nav_id){
        $re = Navs::where('nav_id',$nav_id)->delete();
        if($re){
            $data =[
                'status' => 0,
                'msg' => 'Delete Success!'
            ];
        }else{
            $data =[
                'status' => 1,
                'msg' => 'Delete Failed!'
            ];
        }
        return $data;
    }

}

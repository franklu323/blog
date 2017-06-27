<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    public function index(){
        $data = Links::orderBy('link_order','asc')->get();
        return view('admin.links.index',compact('data'));
    }

    public function changeOrder(){
        $input = Input::all();
        $links = Links::find($input['link_id']);
        $links->link_order = $input['link_order'];
        $re = $links->update();

        if($re){
            $data = [
                'status' => 0,
                'msg' => 'Link order update successful!'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Link order update failed!'
            ];
        }
        return $data;
    }


    public function show(){

    }

    public function create(){
        return view('admin/links/add');
    }

    public function store(){
        $input = Input::except('_token');
        $rules = [
            'link_name' => 'required',
            'link_url' => 'required',
        ];
        $message = [
            'link_name.required'=>'Link name is required. Please Filled up the category name',
            'link_url.required'=>'Link URL is required. Please Filled up the category name'
        ];
        $validator = Validator::make($input, $rules,$message);
        if ($validator->passes()) {
            $re = Links::create($input);
            if($re){
                return redirect('admin/links');
            }else{
                return back()->with('errors','Unknown error, please try again later');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //GET|HEAD                       | admin/links/{links}/edit | links.edit 编辑链接
    public function edit($link_id){
        $field = Links::find($link_id);
        return view('admin.links.edit', compact('field'));
    }


    //PUT|PATCH                      | admin/links/{links}      | link.update 更新链接
    public function update($link_id){
        $input = Input::except('_token','_method');
        $re = Links::where('link_id',$link_id)->update($input);
        if($re){
            return redirect('admin/links');
        }else{
            return back()->with('errors','Update failed, please try later');
        }
    }
    
    //DELETE                         | admin/links/{links}      | links.destroy 删除链接
    public function destroy($link_id){
        $re = Links::where('link_id',$link_id)->delete();
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

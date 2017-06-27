<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class CategoryController extends CommonController
{
    //GET|HEAD                       | admin/category                 | category.index 全部分类列表
    public function index(){
        //$categorys = Category::tree();
        $categorys = (new Category)->tree();
        return view('admin.category.index')->with('data',$categorys);
    }

    // POST                           | admin/category                 | category.store  添加分类
    public function store(){
        $input = Input::except('_token');
        $rules = [
            'cate_name' => 'required',
        ];
        $message = [
            'cate_name.required'=>'Category name is required. Please Filled up the category name'
        ];
        $validator = Validator::make($input, $rules,$message);
        if ($validator->passes()) {
            $re = Category::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','Unknown error, please try again later');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //DELETE                         | admin/category/{category}      | category.destroy 删除分类
    public function destroy($cate_id){
        $re = Category::where('cate_id',$cate_id)->delete();
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
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

    //|GET|HEAD                       | admin/category/create          | category.create 添加分类
    public function create(){
        $data = Category::where('cate_pid',0)->get();
        return view('admin/category/add',compact('data'));
    }

    // |GET|HEAD                       | admin/category/{category}      | category.show 显示单个分类信息
    public function show(){

    }

    //PUT|PATCH                      | admin/category/{category}      | category.update 更新分类
    public function update($cate_id){
        $input = Input::except('_token','_method');
        $re = Category::where('cate_id',$cate_id)->update($input);
        if($re){
            return redirect('admin/category');
        }else{
            return back()->with('errors','Update failed, please try later');
        }
    }

    //GET|HEAD                       | admin/category/{category}/edit | category.edit 编辑分类
    public function edit($cate_id){
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.edit', compact('field','data'));
    }

    public function changeOrder(){
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();

        if($re){
            $data = [
              'status' => 0,
                'msg' => 'Category order update successful!'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Category order update failed!'
            ];
        }
        return $data;

    }




}

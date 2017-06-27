<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Yaml\Tests\A;

class ArticleController extends CommonController
{
    //get.admin/article 全部文章列表
    public function index(){
        $data = Article::orderBy('art_id','desc')->paginate(10); //paginate(int)分页方法,int里面填写一页多少数据。1页10个article
        return view('admin.article.index',compact('data'));
    }


    //|GET|HEAD                       | admin/article/create          | article.create 添加文章
    public function create(){
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    public function store(){
        $input = Input::except('_token');
        $input['art_time'] = time();

        //验证，文章标题不能为空，文章内容不能为空
            $rules = [
                'art_title' => 'required',
                'art_content' => 'required',
            ];
            $message = [
                'art_title.required'=>'Article name is required. Please Filled up the article name!',
                'art_content.required' =>'Article content is required. Please Filled up the article content!'
            ];
            $validator = Validator::make($input, $rules,$message);
            if ($validator->passes()) {
                $re = Article::create($input);
                if($re){
                    return redirect('admin/article');
                }else{
                    return back()->with('errors','Unknown error, please try again later');
                }
            } else {
                return back()->withErrors($validator);
            }
        }

        //get.admin/article/{article}/edit 编辑文章
        public function edit($art_id){
            $data = (new Category)->tree();
            $field = Article::find($art_id);
            return view('admin.article.edit',compact('data','field'));
        }

        //put.admin/article/{article}  更新文章
        public function update($art_id){
            $input = Input::except('_token','_method');
            $re = Article::where('art_id',$art_id)->update($input);
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','Article update failed, please try later');
            }
        }

        //DELETE                         | admin/article/{article}      | article.destroy 删除文章
        public function destroy($art_id){
            $re = Article::where('art_id',$art_id)->delete();
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

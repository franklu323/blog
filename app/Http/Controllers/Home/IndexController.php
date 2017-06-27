<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;

class IndexController extends CommonController
{
    public function index(){

        //most views articles (6 art pic base)
        $hot = Article::orderBy('art_view','desc')->take(6)->get();

        //article list (5 list)
        $data = Article::orderBy('art_time','desc')->paginate(5);

        //useful links
        $links = Links::orderBy('link_order','asc')->get();

        //web config

        return view('home.index',compact('data','links','hot'));
    }

    public function about(){
    return view('home.about');
    }

    public function contact(){
        return view('home.contact');
    }

    public function blog(){
        $data = Article::orderBy('art_time','desc')->paginate(5);
        return view('home.blog',compact('data'));
    }

    public function cate($cate_id){

        //view times auto increase
        Category::where('cate_id',$cate_id)->increment('cate_view');

        //article list (5 list)
        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);

        //current cate's sub-cate
        $submenu = Category::where('cate_pid',$cate_id)->get();

        $field = Category::find($cate_id);
        return view('home.list',compact('field','data','submenu'));
    }

    public function art($art_id)
    {

        $field = Article::Join('category', 'article.cate_id', '=', 'category.cate_id')->where('art_id', $art_id)->first();

        $article['pre'] = Article::where('art_id', '<', $art_id)->orderBy('art_id', 'desc')->first();
        $article['next'] = Article::where('art_id', '>', $art_id)->orderBy('art_id', 'asc')->first();

        $data = Article::where('cate_id', $field->cate_id)->orderBy('art_id', 'desc')->take(6)->get();

        //view times auto increase
        Article::where('art_id', $art_id)->increment('art_view');

        return view('home.new', compact('field', 'article', 'data'));
    }
}

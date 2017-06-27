<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Navs;
use App\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct(){

        //most views articles (5 art)
        $hots = Article::orderBy('art_view','desc')->take(5)->get();

        //newest articles (8 art)
        $new = Article::orderBy('art_time','desc')->take(8)->get();


        $navs = Navs::orderBy('nav_id','asc')->get();
        View::share('navs',$navs);
        View::share('hots',$hots);
        View::share('new',$new);
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function(){
    Route::get('/', 'Home\IndexController@index');
    Route::get('/blog', 'Home\IndexController@blog');
    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    Route::get('/art/{art_id}', 'Home\IndexController@art');
    Route::get('/about', 'Home\IndexController@about');
    Route::get('/contact', 'Home\IndexController@contact');

    Route::get('admin/code', 'Admin\LoginController@code');
    Route::any('admin/login', 'Admin\LoginController@login');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function(){
    Route::get('/', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::post('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category','CategoryController');

    Route::resource('article','ArticleController');

    Route::post('links/changeorder', 'LinksController@changeOrder');
    Route::resource('links','LinksController');

    Route::post('navs/changeorder', 'NavsController@changeOrder');
    Route::resource('navs','NavsController');

    Route::post('config/changecontent', 'ConfigController@changeContent');
    Route::post('config/changeorder', 'ConfigController@changeOrder');
    Route::get('config/putfile', 'ConfigController@putFile');
    Route::resource('config','ConfigController');


    //分配图片上传路由，到commoncontroller底下的upload里
    Route::any('upload', 'CommonController@upload');
});
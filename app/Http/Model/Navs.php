<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    //连接Mysql数据库，把值定义，不让它取自己的已定义值
    protected $table ='navs';
    protected $primaryKey='nav_id';
    public $timestamps = false;
    protected $guarded=[];
}

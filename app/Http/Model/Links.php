<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //连接Mysql数据库，把值定义，不让它取自己的已定义值
    protected $table ='links';
    protected $primaryKey='link_id';
    public $timestamps = false;
    protected $guarded=[];
}

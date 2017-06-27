<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //连接Mysql数据库，把值定义，不让它取自己的已定义值
    protected $table ='user';
    protected $primaryKey='user_id';
    public $timestamps = false;
    protected $guarded=[];
}

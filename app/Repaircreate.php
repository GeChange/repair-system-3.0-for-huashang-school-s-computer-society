<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


//默认是模型名+s就是连接的数据库表名，在这里我们自定义与模型关联的数据表
class Repaircreate extends Model
{
    use SoftDeletes;
    //与Repaircreate关联的数据表
    protected $table = "repaircreate";//链接指定数据表（表单表）


    protected  $guarded = []; // 解决不能填充的字段的问题的写法
    protected $dates = ['delete_at'];

    //protected $fillable = ['aaa','aaa','jjjj']//这个可以指定可不可以填充

    public function belongsToUser()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

//    public function hasManyrepairs(){
//        return $this->hasmany('Dormitory','user_id','id');
//    }

//     public function dormitorys(){
//         return $this->belongsTo('Dormitory','user_dormitory_id');
//     }

}


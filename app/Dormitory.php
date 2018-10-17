<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    //与dormitorys关联的数据表
    protected $table = "dormitorys";//宿舍楼的表
    protected  $guarded = []; // 解决不能填充的字段的问题的写法，允许任何值传入，还有一种方法允许指定值传入

}

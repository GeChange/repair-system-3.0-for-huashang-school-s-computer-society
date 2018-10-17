<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{

    //与Invite关联的数据表
    protected $table = "invites";//链接指定数据表（表单表）

    protected  $guarded = []; // 解决不能填充的字段的问题的写法

}

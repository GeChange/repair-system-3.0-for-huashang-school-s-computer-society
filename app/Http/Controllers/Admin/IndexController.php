<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Dormitory;
use App\Repaircreate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return redirect("/admin/showaccept");
        //return view('admin/index');
    }
	
    //读出所有报修未接单列表
    public function showlist(Repaircreate $post)
    {
        $posts = Repaircreate::orderBy('created_at','desc')->where('status','=',0)->Paginate(6);//根据时间排序，每页展示6个表单
        return view("/admin/repair-list",compact('posts'));
    }

    // 读出已经接单情况
    public function showaccept()
    {
        $users = DB::table('repaircreate')
            ->join('users', 'repaircreate.user_id', '=', 'users.id')
            ->select('repaircreate.id','users.name', 'repaircreate.user_name','repaircreate.user_dormitory_id',  'repaircreate.user_phone','repaircreate.user_room','repaircreate.user_message','repaircreate.updated_at','repaircreate.suggest_message')
            ->where('repaircreate.status','=',1)
            ->orderBy('repaircreate.updated_at','desc')
            ->Paginate(6);

        return view('admin.index',compact('users'));

    }
    // 读出所有已经完成单子情况
    public function showfinish()
    {
        $users = DB::table('repaircreate')
            ->join('users', 'repaircreate.user_id', '=', 'users.id')
            ->select('repaircreate.id','users.name', 'repaircreate.user_name','repaircreate.user_dormitory_id',  'repaircreate.user_phone','repaircreate.user_room','repaircreate.user_message','repaircreate.updated_at','repaircreate.suggest_message')
            ->where('repaircreate.status','=',2)
            ->orderBy('repaircreate.updated_at','desc')
            ->Paginate(6);

        return view('admin.finish',compact('users'));
    }

    // 读出所有已经用户维修情况
    public function showusers()
    {

        //$users = User::orderBy('created_at', 'desc')->withCount(["repairs"])->paginate(6);

        $users = User:: select('name')
               ->withCount(["repairs" => function ($query) {$query->where('status', '=', '2');}])
               ->paginate(6);

        return view('admin.userslist',compact('users'));
    }


}

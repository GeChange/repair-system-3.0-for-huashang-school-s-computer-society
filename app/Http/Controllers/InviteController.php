<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
use Clarkeash\Doorman\Doorman;




class inviteController extends Controller
{
    protected $doorman, $request;
    public function __construct(Doorman $doorman, Request $request)
    {
        $this->request = $request;
        $this->doorman = $doorman;
    }




    //显示要生成邀请码页面
    public function index()
    {
        return view("invite.invite");
    }

    //邀请码创建

    public function create()
    {

        $this->doorman->generate()->uses(300)->make();
        return redirect()->action('\App\Http\Controllers\InviteController@finish');

    }



    //显示要生成的邀请码页面
    public function finish()
    {
        $posts = Invite::orderBy('created_at','desc')->Paginate(6);//根据时间排序，每页展示6个表单
        return view("invite.invited",compact('posts'));
    }

    //显示邀请码的使用次数
/*    public function check()
    {
        $posts = Invite::select('uses','code')->Paginate(6);//根据时间排序，每页展示6个表单;
        return view('invite.invited',compact('posts'));
    }*/





}

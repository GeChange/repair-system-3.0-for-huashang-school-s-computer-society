<?php

namespace App\Http\Controllers;

use App\Dormitory;
use App\Repaircreate;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class BackstageController extends Controller
{
//    protected $user;
//
//    public function _construct()
//    {
//       $this->middleware(function($request,$next){
//          $this->user = $request->user();
//
//          return $next($request);
//       });
//    }




    //报修未接单列表
    public function index(Repaircreate $post)
    {
        $posts = Repaircreate::orderBy('created_at','desc')->where('status','=',0)->Paginate(6);//根据时间排序，每页展示6个表单
        return view("/backstage/repair-list",compact('posts'));
    }

    //个人已接未完成单子
    public function accepted(Repaircreate $post)
    {
        $operator = Auth::id();
        $input = [
            'user_id'=> $operator,
            'status'=>1,
        ];
        $posts = Repaircreate::orderBy('created_at','desc')->where($input)->Paginate(6);
        return view("/backstage/operator-accepted",compact('posts'));
    }

    //个人已完成单子
    public function finished(Repaircreate $post)
    {
        $operator = Auth::id();
        $input = [
            'user_id'=> $operator,
            'status'=>2,
        ];
        $posts = Repaircreate::orderBy('created_at','desc')->where($input)->Paginate(6);
        return view("/backstage/operator-finished",compact('posts'));
        //dd($posts);
    }


    //选择宿舍页面
    public function bydormitory()
    {
        /**
         * 显示创建报修的表单
         */
        $posts = Dormitory::orderBy('id','asc')->Paginate(46);//根据宿舍楼序号排序，46栋
        return view("/backstage/bydormitory",compact('posts'));

        //return view("repair/create");
    }

   //按宿舍查找未接单的单子
    public function bydormitoryed($id)
    {


       $user_dormitory_id =$id;
       $input = [
            'user_dormitory_id'=>$user_dormitory_id,
            'status'=>0,
        ];


         $posts = Repaircreate::orderBY('created_at','desc')->where($input)->paginate(6);

         return view('/backstage/bydormitoryed',compact('posts'));
    }


    //动作逻辑
    //接单
    public function accept(Request $request,$id)
    {

        $operator = Auth::id();

        $input = [
            'user_id'=> $operator,
            'status'=>1,
        ];
        $post = Repaircreate::find($id);
        if($post->update($input)){
            return redirect("/backstage");
        }

    }

    //完成单子
    public function finish(Request $request,$id)
    {
        //之后还要做用户权限验证
        $operator = Auth::id();

        $input = [
            'user_id'=> $operator,
            'status'=>2,
        ];
        $post = Repaircreate::find($id);
        if($post->update($input)){
            return redirect("/backstage/accepted");

        }
    }

    //删除单子
    public function delete(Repaircreate $post)
    {
        //只有通过手机查询的才能删除
        $post->delete();
        if($post->trashed()){
            echo '删除成功！';
            //dd($post);
        }else{
           echo '软删除失败！';
        }


        return redirect("/backstage");//返回列表页

    }


    public function look_suggested()
    {


        $posts = DB::table('repaircreate')
            ->join('users', 'repaircreate.user_id', '=', 'users.id')
            ->select('users.name', 'repaircreate.user_name', 'repaircreate.user_phone','repaircreate.updated_at','repaircreate.suggest_message')
            ->where('repaircreate.suggest_message','!=',NULL)
            ->orderBy('repaircreate.updated_at','desc')
            ->Paginate(6);

        return view("backstage/look_suggested",compact('posts'));
    }

    public function getReset()
    {
        return view('auth.reset');
    }

    public function postReset(Request $request)
    {
        $oldpassword = $request->input('oldpassword');
        $password = $request->input('password');
        $data = $request->all();
        $rules = [
            'oldpassword'=>'required|between:6,20',
            'password'=>'required|between:6,20|confirmed',
        ];
        $messages = [
            'required' => '密码不能为空',
            'between' => '密码必须是6~20位之间',
            'confirmed' => '新密码和确认密码不匹配'
        ];
        $validator = Validator::make($data, $rules, $messages);
        $user = Auth::user();
        $validator->after(function($validator) use ($oldpassword, $user) {
            if (!\Hash::check($oldpassword, $user->password)) {
                $validator->errors()->add('oldpassword', '原密码错误');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator);  //返回一次性错误
        }
        $user->password = bcrypt($password);
        $user->save();
        Auth::logout();  //更改完这次密码后，退出这个用户
        return redirect('/login');
    }

}

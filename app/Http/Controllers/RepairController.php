<?php

namespace App\Http\Controllers;
use App\Repaircreate;
use App\Dormitory;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    //创建报修
    public function create()
    {
        /**
         * 显示创建报修的表单
         */
        $posts = Dormitory::orderBy('id','asc')->Paginate(46);//根据宿舍楼序号排序，46栋
        return view("repair/create",compact('posts'));

        //return view("repair/create");
    }


    /**
     * 保存一个新的报修表单。
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        //验证报修表单及保存表单

        //验证
        $this->validate(request(),[
            //'user_id'=>'required|integer|max:9|min:9',
            'user_name'=>'required|string|max:10',
            'user_phone'=>'regex:/^1[34578][0-9]{9}$/',//正则匹配手机号码
            'user_dormitory_id'=>'required|string|max:10',
            'user_room'=>'required|string|max:10',
            'user_message'=>'required|string|max:200'],
            [
                'user_name.max' => '你输入的名字过长',//验证不通过提示，下面的也是
                'user_phone.regex' => '你输入的手机号有错',
                'user_room.max'=>'你输入的宿舍名字过长',
                'user_message.max'=>'故障问题可以简洁点哦',
            ]
        );

        //逻辑
        //创建数据到数据库
       $post = Repaircreate::create(request(['user_name','user_phone','user_dormitory_id','user_room','user_message']));



       //渲染  先显示提交成功，然后3秒后跳转到创建页
        return redirect("repair/success");



    }



    public function success()
    {
        /**
         * 跳转到成功页面
         */
        return view("repair/success");
    }



    public function index()
    {
        /**
         * 显示查询页面
         */
        return view('inquire.index');

    }

    public function query(Request $request)
    {
        /**
         * 查询逻辑
         */
        //dd(request()->all());
        //验证

        $this->validate(request(),[
            'name'=>'regex:/^1[34578][0-9]{9}$/',//正则匹配手机号码
        ],
            [
                'name.regex' => '输入手机格式不对，请重新提交',
            ]
        );

        $posts = Repaircreate::where('user_phone', '=', $request['name']) ->get();

        return view("inquire/finish")->with('posts',$posts);


    }

    public function delete(Repaircreate $post)
    {
        /**
        * 前台用户软删除
         *
         */
        $post->delete();
        if($post->trashed()){
            echo '删除成功！';
        }else{
            echo '软删除失败！';
        }


    }

    public function suggest()
    {
        /**
         * 展示投诉页面
         */
        return view("suggest/index");
    }

    public function suggesting(Request $request)
    {
        /**
         * 投诉表单保存逻辑
         */

        //验证
        $this->validate(request(),[
            'user_name'=>'required|string|max:10',
            'user_phone'=>'regex:/^1[34578][0-9]{9}$/',//正则匹配手机号码
            'suggest_message'=>'required|string|max:200'],
            [
                'user_name.max' => '你输入的名字过长',//验证不通过提示，下面的也是
                'user_phone.regex' => '你输入的手机号有错',
                'suggest_message.max'=>'投诉或意见可以简洁点哦',
            ]
        );

        //逻辑
        //更新投诉或建议数据到数据库,投诉时间可对应到updated_at字段
        $post = Repaircreate::where('user_phone', '=', $request['user_phone'])->update(request(['suggest_message']));
        return redirect("/suggested");


    }

    public function suggested()
    {
        return view('suggest/suggested');
    }

    public function index1()
    {
        $webshow=config('web.webshow');
        return view('repair.index1',compact('webshow'));
    }

}

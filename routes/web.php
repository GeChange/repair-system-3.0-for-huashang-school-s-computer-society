<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');

});


Route::group(['middleware' =>['web','checkstate']], function () {
    //前台报修页面(创建报修)
    Route::get('/repair/create','\App\Http\Controllers\RepairController@create');//创建页面
    Route::post('/repair','\App\Http\Controllers\RepairController@store');//创建逻辑
    Route::get('/repair/success','\App\Http\Controllers\RepairController@success');//报修成功页
    //前台查询报修页面
    Route::get('/inquire','\App\Http\Controllers\RepairController@index');
    //前台查询逻辑
    Route::post('/inquire/query','\App\Http\Controllers\RepairController@query');
    //前台用户删除
//    Route::any('/inquire/query/{post}/delete','\App\Http\Controllers\RepairController@delete');
    //前台投诉页面
    Route::get('/suggest','\App\Http\Controllers\RepairController@suggest');
    //前台投诉逻辑
    Route::post('/suggesting','\App\Http\Controllers\RepairController@suggesting');
    //前台投诉成功
    Route::get('/suggested','\App\Http\Controllers\RepairController@suggested');


});




Route::group(['middleware' => 'auth'], function () {
    //报修列表页（未接的单子）
    Route::get('/backstage','\App\Http\Controllers\BackstageController@index');
    //个人已接未完成单子
    Route::get('/backstage/accepted','\App\Http\Controllers\BackstageController@accepted');
    //个人已完成单子
    Route::get('/backstage/finished','\App\Http\Controllers\BackstageController@finished');
    //选择要查询的宿舍的单子
    Route::get('/backstage/bydormitory','\App\Http\Controllers\BackstageController@bydormitory');
    //按宿舍查找单子
    Route::any('/backstage/bydormitory/{post}','\App\Http\Controllers\BackstageController@bydormitoryed');
    //报修详情页
    Route::get('/backstage/{post}','\App\Http\Controllers\BackstageController@show')->middleware('auth');
    //编辑报修单子
    Route::get('/backstage/{post}/accept','\App\Http\Controllers\BackstageController@accept');//接单
    Route::get('/backstage/{post}/finish','\App\Http\Controllers\BackstageController@finish');//完成
    //Route::any('/backstage/{post}/delete','\App\Http\Controllers\BackstageController@delete');//删除单子

    Route::get('reset', 'BackstageController@getReset');//显示一个重置密码的页面get请求
    Route::post('reset', 'BackstageController@postReset');//重置密码post请求。

});




//登录注册
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'Admin\IndexController@index');
        Route::any('changestate','\App\Http\Controllers\Admin\ChangestateController@index');
        Route::any('notice','\App\Http\Controllers\Admin\NoticeController@index');
    });
});

Route::group(['middleware' => 'auth:admin'], function () {
//注册码
    Route::get('/invite','\App\Http\Controllers\InviteController@index');//显示要生成邀请码页面
    Route::get('/invite/create', '\App\Http\Controllers\InviteController@create');//生成逻辑
    Route::get('/invite/finish','\App\Http\Controllers\InviteController@finish');//生成成功页
//Route::get('/invite/check','\App\Http\Controllers\InviteController@check');//检查邀请码使用次数
    Route::get('/look_suggested','\App\Http\Controllers\BackstageController@look_suggested');//查看投诉或建议页面
    Route::get('admin/showaccept', '\App\Http\Controllers\Admin\IndexController@showaccept');// 读出所有接单情况（包括维修员）
    Route::get('admin/showfinish', '\App\Http\Controllers\Admin\IndexController@showfinish');// 读出所有完成单情况（包括维修员）
    Route::get('admin/showusers', '\App\Http\Controllers\Admin\IndexController@showusers');// 读出所有维修员情况
    Route::get('/admin/showlist','\App\Http\Controllers\Admin\IndexController@showlist'); //读出所有未接单子


});

    Route::any('showstate','\App\Http\Controllers\RepairController@index1');








<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepaircreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //int的字段长本身就有限制，重新定义的时候有报错
        Schema::create('repaircreate', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->default(0)->comment('报修人学号');
            $table->string('user_name')->default("")->comment('报修人名字');
            $table->bigInteger('user_phone')->comment('报修人手机号码');
            $table->string('user_dormitory_id')->comment('报修人所在宿舍楼');
            $table->string('user_room')->comment('报修人所在房间');
            $table->string('user_message')->default("")->comment('电脑故障详情');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repaircreate');

    }
}

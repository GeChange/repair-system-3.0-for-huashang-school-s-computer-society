<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormitorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //int的字段长本身就有限制，重新定义的时候有报错
        Schema::create('dormitorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_dormitory')->comment('报修人所在宿舍楼');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dormitorys');

    }
}

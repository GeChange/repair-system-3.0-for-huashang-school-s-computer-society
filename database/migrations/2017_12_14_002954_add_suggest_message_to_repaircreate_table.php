<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestMessageToRepaircreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repaircreate', function (Blueprint $table) {
            $table->string('suggest_message')->default("")->comment('投诉或建议详情');//这里出了点问题，应该是null的

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repaircreate', function (Blueprint $table) {
            //
            Schema::dropIfExists('repaircreate');
        });
    }
}

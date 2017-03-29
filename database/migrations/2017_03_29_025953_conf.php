<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Conf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            @Schema::create('confs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('namespace');  //名称空间
                $table->string('name');       //key名称
                $table->string('value');      //值
                $table->string('desc');      //描述信息   
                $table->integer('type');     //后台渲染类型  0 选择框 1 文本框 2 图片上传 3文件上传
                $table->string('user_id');    //创建者 用户id
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
        Schema::dropIfExists('conf');
    }
}

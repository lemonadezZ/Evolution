<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            @Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();       //用户名
                $table->string('email')->unique();      //用户邮箱
                $table->string('password');             //密码
                $table->string('phone');                //用户手机号
                $table->string('invitation_code');      //邀请码
                $table->string('lastloginip');          //最后登录ip
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

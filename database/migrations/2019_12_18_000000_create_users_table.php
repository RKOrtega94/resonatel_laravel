<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_id')->nullable(false);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedInteger('group_id')->nullable(false);
            $table->foreign('group_id')->references('id')->on('group');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('dni')->unique();
            $table->string('email')->unique();
            $table->string('user')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('status', 1)->default('A');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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

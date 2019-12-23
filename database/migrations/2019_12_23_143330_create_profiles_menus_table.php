<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('profile_id')->nullable(false);
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->unsignedInteger('menu_id')->nullable(false);
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('profiles_menus');
    }
}

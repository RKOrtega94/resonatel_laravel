<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->string('brand', 50);
            $table->string('icon', 50);
            $table->string('idItem', 50);
            $table->boolean('show')->default(1);
            $table->unsignedInteger('parent')->default(0);
            $table->unsignedInteger('order')->default(0);
            $table->boolean('enabled')->default(1);
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
        Schema::dropIfExists('menu_by_rols');
        Schema::dropIfExists('menus');
    }
}

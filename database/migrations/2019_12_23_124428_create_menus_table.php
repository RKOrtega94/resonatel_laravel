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
            $table->string('name', 25)->unique()->nullable(false);
            $table->string('brand', 50)->unique()->nullable();
            $table->string('slug', 50)->nullable();
            $table->string('icon', 50)->nullable();
            $table->unsignedInteger('parent')->default(0);
            $table->smallInteger('order')->default(200);
            $table->boolean('menu_item')->default(0);
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
        Schema::dropIfExists('menus');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->unique()->nullable(false);
            $table->string('description', 150)->nullable(false);
            $table->decimal('meta', 5, 2)->nullable(false);
            $table->string('signo', 2)->nullable(false);
            $table->boolean('enabled')->default(0);
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
        Schema::dropIfExists('indicators');
    }
}

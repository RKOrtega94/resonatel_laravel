<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_header', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150)->unique()->nullable(false);
            $table->timestamp('start_at')->nullable(false);
            $table->timestamp('end_at')->nullable(false);
            $table->integer('duration')->nullable(false);
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
        Schema::dropIfExists('evaluation_header');
    }
}

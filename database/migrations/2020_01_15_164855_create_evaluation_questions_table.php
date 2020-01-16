<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('evaluation_header_id');
            $table->foreign('evaluation_header_id')->references('id')->on('evaluation_header');
            $table->string('question')->nullable(false);
            $table->enum('type', ['radio', 'check'])->default('radio');
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
        Schema::dropIfExists('evaluation_questions');
    }
}

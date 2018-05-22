<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeAnsKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_ans_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('college_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('answer');

            // $table->foreign('college_id')->references('id')->on('colleges');
            // $table->foreign('questionID')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('college_ans_keys');
    }
}

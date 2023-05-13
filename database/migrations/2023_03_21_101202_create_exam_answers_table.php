<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->increments('exam_answers_id');
            $table->integer('question_text');
            $table->integer('answer_text');
            $table->integer('correct_answer');
            $table->unsignedInteger('exam_result_id');
            $table->foreign('exam_result_id')->references('exam_result_id')->on('exam_result')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_answers');
    }
};

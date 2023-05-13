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
        Schema::create('exam_result', function (Blueprint $table) {
            $table->increments('exam_result_id');
            $table->integer('exam_grade');
            $table->integer('correct_answers');
            $table->integer('wrong_answers');
            $table->dateTime('exam_date');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_result');
    }
};

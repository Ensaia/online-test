<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->increments('answer_id');
            $table->string('answer_text',255);
            $table->enum('is_correct',['0','1']);
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('question_id')->on('question')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer');
    }
};

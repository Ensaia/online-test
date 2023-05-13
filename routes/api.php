<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Answer;

/*
|:---------------------------------------------------------------------------|
| API Routes                                                                 |
| -------------------------------------------------------------------------- |
|                                                                            |
| Here is where you can register API routes for your application. These      |
| routes are loaded by the RouteServiceProvider and all of them will         |
| be assigned to the "api" middleware group. Make something great!           |
|                                                                            |
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(App\Http\Controllers\Api\ExamController::class)->group(function () {
    Route::post('/exam/submit', 'examSubmit');
    Route::get('/exam/results', 'examResults');
    Route::get('/exam/answers/{exam_result_id}', 'examAnswers');
    Route::delete('/exam/result/destroy/{exam_result_id}', 'destroyExamResult');
});

Route::controller(\App\Http\Controllers\Api\QuestionController::class)->group(function () {
    Route::get('/questions', 'index')->name('questionsIndex');
    Route::get('/question/show/{question_id}', 'show')->name('questionShow');
    Route::post('/question/store', 'store')->name('questionStore');
    Route::patch('/question/update', 'update')->name('questionUpdate');
    Route::delete('/question/destroy/{question_id}', 'destroy')->name('questionDestroy');
    Route::patch('/question/update/test', 'test')->name('questionUpdateTest');
});
Route::get('/result', function () {

    return Answer::select('answer_text', 'is_correct')
        ->where([['answer.answer_id', '=', 1], ['answer.question_id', '=', 1]])
        ->first();

    $users = Illuminate\Support\Facades\DB::table('question')
        ->join('answer', 'question.question_id', '=', 'answer.answer_id')
        ->select('question.question_text', 'answer.answer_text', 'answer.is_correct')
        ->where('question.question_id', '=', 1)
        ->get();
    return $users;
    Illuminate\Support\Facades\DB::table('answer')
        ->select('answer.answer_text', 'answer.is_correct')
        ->where('answer.answer_id', '=', 1)
        ->get();
});

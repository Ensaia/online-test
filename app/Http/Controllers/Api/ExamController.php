<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResultResource;
use App\Http\Resources\ExamAnswersResource;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\ExamResult;
use App\Models\ExamAnswers;
use Illuminate\Support\Facades\Config;

class ExamController extends Controller
{
    public function examSubmit(Request $request)
    {
        $questions_id_array = [];
        $exam_data = [];
        $data = [];
        $correct_answers = 0;
        $wrong_answers = 0;
        $exam_grade = 0;
        foreach ($request->answers as $question_id => $answer_id) {
            $questions_id_array[] = $question_id;
            $exam_data['question_id'] = $question_id;
            $exam_data['answer_id'] = $answer_id;
            $data[] = $exam_data;
            $answer = Answer::select('answer_text', 'is_correct')->where([
                [
                    'answer.answer_id',
                    '=',
                    $answer_id
                ],
                [
                    'answer.question_id',
                    '=',
                    $question_id
                ]
            ])->first();
            if ($answer->is_correct == 1) {
                $correct_answers ++;
            } elseif ($answer->is_correct == 0) {
                $wrong_answers ++;
            }
            (int) $exam_grade = number_format(($correct_answers / count($questions_id_array)) * 100);
        }

        // $this->insertExamResult($exam_grade, $correct_answers, $wrong_answers, $data);
        return response()->json([
            'correct_answers' => $correct_answers,
            'wrong_answers' => $wrong_answers,
            'exam_grade' => $exam_grade
        ]);
    }

    public function insertExamResult($exam_grade, $correct_answers, $wrong_answers, $data)
    {
        $exam_result = new ExamResult();
        $exam_result->exam_grade = $exam_grade;
        $exam_result->correct_answers = $correct_answers;
        $exam_result->wrong_answers = $wrong_answers;
        $exam_result->exam_date = date('Y-m-d h:i:s');
        $exam_result->user_id = 1;
        $exam_result->save();
        if(count($data) > 0){
            foreach ($data as $value) {
                $exam_answers = new ExamAnswers();
                $exam_answers->question_text = $this->getQuestionByID($value['question_id']);
                $exam_answers->answer_text = $this->getAnswerByID($value['answer_id']);
                $exam_answers->correct_answer = $this->getCorrectAnswerByID($value['question_id'], $value['answer_id']);
                $exam_result->examAnswers()->save($exam_answers);
            }
        }
    }

    public function examResults(){
        return ExamResultResource::collection(
            ExamResult::where('user_id' , '=' , '1')
                ->paginate(10)
        );
    }

    public function destroyExamResult($exam_result_id){
        return response()->json($exam_result_id);
        $is_inserted = false;
        if(ExamResult::destroy($exam_result_id)){
            return response()->json([
                'success' => Config::get ( 'constants.message.DELETE_SUCCESS' )
            ]);
        } else {
            return response()->json([
                'error' => Config::get ( 'constants.message.DELETE_ERROR' )
            ]);
        }
    }

    public function examAnswers($exam_result_id)
    {
        return ExamAnswersResource::collection(
            ExamAnswers::where('exam_answers.exam_result_id', '=', $exam_result_id)
                ->paginate(10)
        );
    }

    public function getQuestionByID($question_id)
    {
        $question_text = Question::select('question_text')->where('question.question_id', '=', $question_id)->first();
        return $question_text->question_text;
    }

    public function getAnswerByID($answer_id)
    {
        $answer_text = Answer::select('answer_text')->where('answer.answer_id', '=', $answer_id)->first();
        return $answer_text->answer_text;
    }

    public function getCorrectAnswerByID($question_id)
    {
        $answer_text = Answer::select('answer_text')->where([
            [
                'answer.question_id',
                '=',
                $question_id
            ],
            [
                'answer.is_correct',
                '=',
                '1'
            ]
        ])->first();
        return $answer_text->answer_text;
    }
}

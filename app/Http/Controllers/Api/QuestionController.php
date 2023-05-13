<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\QuestionResource;
use Illuminate\Support\Facades\Config;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return QuestionResource::collection(Question::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$validator = Validator::make(
            $request->all(),
            [
                'question_text' => 'required',
                'answer_1' => 'required',
                'answer_2' => 'required',
                'answer_3' => 'required',
                'answer_4' => 'required',
                'is_correct' => 'required',
            ],
            [
                'question_text.required' => 'يجب تعبئة الحقل الخاص بنص السؤال',
                'answer_1.required' => 'يجب تعبئة الحقل الخاص بالإجابة الأولى',
                'answer_2.required' => 'يجب تعبئة الحقل الخاص بالإجابة الثانية',
                'answer_3.required' => 'يجب تعبئة الحقل الخاص بالإجابة الثالثة',
                'answer_4.required' => 'يجب تعبئة الحقل الخاص بالإجابة الرابعة',
                'is_correct.required' => 'يجب تعبئة الحقل الخاص بالإجابة الصحيحة',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['validationErrors' => $validator->errors()]);
        } else {
            $is_inserted = true;
            $answers = [];
            $question_text       = $request->question_text;
            $answers['answer_1'] = $request->answer_1;
            $answers['answer_2'] = $request->answer_2;
            $answers['answer_3'] = $request->answer_3;
            $answers['answer_4'] = $request->answer_4;
            $correct_answer      = $request->is_correct;

            $question = new Question();
            $question->question_text = $question_text;
            if ($question->save()) {
                $is_inserted = true;
            } else {
                $is_inserted = false;
            }


            foreach ($answers as $answer_key => $answer_text) {
                if ($answer_key == $correct_answer) {
                    $is_correct = '1';
                } else {
                    $is_correct = '0';
                }
                $answer = new Answer();
                $answer->answer_text = $answer_text;
                $answer->is_correct = $is_correct;

                if ($question->answers()->save($answer)) {
                    $is_inserted = true;
                } else {
                    $is_inserted = false;
                }
            } // end foreach*/
        $is_inserted = false;
            if ($is_inserted) {
                return response()->json([
                    'success' => Config::get('constants.message.INSERT_SUCCESS')
                ]);
            } else {
                return response()->json([
                    'error' => Config::get('constants.message.INSERT_ERROR')
                ]);
            }
        //}
    }

    /**
     * Display the specified resource.
     */
    public function show($question_id)
    {
        return QuestionResource::collection(
            Question::with('answers')
                ->where('question_id','=',$question_id)
            ->get()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
//        $validator = Validator::make($request->all(),[
//            'question_text' => 'required',
//            'answer_text' => 'required',
//            'is_correct' => 'required',
//        ],[
//            'question_text.required' => 'يجب تعبئة الحقل الخاص بنص السؤال',
//            'answer_text.required' => 'يجب تعبئة الحقل الخاص بنص السؤال',
//            'is_correct.required' => 'يجب تعبئة الحقل الخاص بنص السؤال',
//        ]);
//        if($validator->fails()){
//            return response()->json(['validationErrors' => $validator->errors()]);
//        }else{
//        return response()->json([$request->all()]);
            $is_inserted = true;
            $data = json_decode($request->getContent());
            foreach ($data as $key => $value) {
////                return response()->json($value);
                foreach ($value as $answer_value) {
                    foreach ($answer_value as $answer){
                        return response()->json($answer);
                    return response()->json([
//                        $answer->answer_id,
                        $answer->answer_text,
                        $answer->is_correct
                ]);
                    }
                }
//                $question = Question::findOrFail($value->question_id);
//                $question->question_text = $value->question_text;
//                if($question->save()){
//                    $is_inserted = true;
//                }else{
//                    $is_inserted = false;
//                }
                foreach ($value->answers as $answer_value) {
                    $answer = Answer::findOrFail($answer_value->answer_id);
                    $answer->answer_text = $answer_value->answer_text;
                    $answer->is_correct = $answer_value->is_correct;

                    if($answer()->save()){
                        $is_inserted = true;
                    }else{
                        $is_inserted = false;
                    }
                }
            } // end foreach
        if($is_inserted){
            return response()->json([
                'success' => Config::get ( 'constants.message.UPDATE_SUCCESS' )
            ]);
        } else {
            return response()->json([
                'error' => Config::get ( 'constants.message.UPDATE_ERROR' )
            ]);
        }
//        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($question_id)
    {
        if(Question::destroy($question_id)){
            return response()->json([
                'success' => Config::get ( 'constants.message.DELETE_SUCCESS' )
            ]);
        } else {
            return response()->json([
                'error' => Config::get ( 'constants.message.DELETE_ERROR' )
            ]);
        }
    }


    public function test(Request $request){
        /*
//      $data = json_decode($request->all());
      // json_decode($request->json()->all());
//      return response()->json($request->all());
       foreach ($request->all() as $key => $value) {
//          return response()->json($value);
         foreach ($value as $answer_key => $answer_value) {
//            return response()->json($answer_value['question_text']);
//            return response()->json($answer_value['answers']);
            foreach ($answer_value['answers'] as $answer) {
//                return response()->json($answer);
                return response()->json($answer['answer_id']);
            }
         }
       }
       */
        $data = json_decode($request->getContent());
        foreach ($data as $key => $value) {
            foreach ($value as $question_key => $question_value){
                foreach ($question_value->answers as $answer_key => $answer_value){
                    return response()->json($question_value->answers['answer_text']);
                }
            }
        }
    }
}

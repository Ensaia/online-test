<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamAnswersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'exam_answers_id' => $this->exam_answers_id,
            'question_text' => $this->question_text,
            'answer_text' => $this->answer_text,
            'correct_answer' => $this->correct_answer,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
// CREATE TABLE "exam_answers" (
// 	"exam_answers_id"	integer NOT NULL,
// 	"question_text"	integer NOT NULL,
// 	"answer_text"	integer NOT NULL,
// 	"correct_answer"	integer NOT NULL,
// 	"exam_result_id"	integer NOT NULL,
// 	"created_at"	datetime,
// 	"updated_at"	datetime,
// 	FOREIGN KEY("exam_result_id") REFERENCES "exam_result"("exam_result_id") on delete cascade on update cascade,
// 	PRIMARY KEY("exam_answers_id" AUTOINCREMENT)
// )
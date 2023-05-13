<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'exam_result_id' => $this->exam_result_id,
            'exam_grade' => $this->exam_grade,
            'correct_answers' => $this->correct_answers,
            'wrong_answers' => $this->wrong_answers,
            'exam_date' => $this->exam_date,
            'user_id' => $this->user_id,
            'examAnswers' => ExamAnswersResource::collection($this->examAnswers),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

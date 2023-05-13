<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'question_text' => 'required|unique:question',
            'answer-1' => 'required',
            'answer-2' => 'required',
            'answer-3' => 'required',
            'answer-4' => 'required',
            'correct-answer' => 'required|in:answer-1,answer-2,answer-3,answer-4'
        ];
    }
}

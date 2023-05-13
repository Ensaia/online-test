<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exam_result';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'exam_result_id';
    /**
     * Get the answers for the exam.
     */
    public function examAnswers(){
        return $this->hasMany(ExamAnswers::class,'exam_result_id');
    }
}

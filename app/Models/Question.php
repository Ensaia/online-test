<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'question_id';
    /**
     * Get the answers for the question.
     */
    public function answers(){
        return $this->hasMany(Answer::class,'question_id');
    }
}

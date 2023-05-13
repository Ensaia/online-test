<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answer';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'answer_id';
}

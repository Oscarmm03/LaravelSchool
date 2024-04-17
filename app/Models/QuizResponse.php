<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'user_id',
        'answer',
        'is_correct',
        'answered_at'
    ];

    public function quizQuestion()
    {
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

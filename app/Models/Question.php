<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'quiz_id',
        'answer_type',
    ];

    protected $casts = [
        'title' => 'string',
        'status' => 'boolean',
        'answer_type' => 'string',

    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function quizQuestion()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id');
    }

    public function correctAnswer()
    {
        return $this->hasMany(Answer::class)->where('is_correct', true);
    }
}

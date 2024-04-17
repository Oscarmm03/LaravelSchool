<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'grade',
        'feedback',
        'graded_by',
        'graded_at'
    ];

    public function assigmentSubmission()
    {
        return $this->belongsTo(AssignmentSubmission::class, 'submission_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'description',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'url',
        'description',
        'type',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

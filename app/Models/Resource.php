<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'resource_type',
        'url',
        'content',
        'uploaded_by'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'course_id',
    ];

    public function department()
    {
        return $this->hasMany(Department::class, 'department_id');
    }
    public function course()
    {
        return $this->hasMany(Course::class, 'course_id');
    }
}

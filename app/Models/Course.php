<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'department_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function enrollments()
    {
        return $this->hasMany(CourseEnrollment::class);
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
    public function calendarEvent()
    {
        return $this->hasMany(CalendarEvent::class);
    }
    public function courseEnrollment()
    {
        return $this->hasMany(CourseEnrollment::class);
    }
    public function departmentCourse()
    {
        return $this->hasMany(DepartmentCourse::class);
    }
    public function externalResource()
    {
        return $this->hasMany(ExternalResource::class);
    }
    public function forum()
    {
        return $this->hasMany(Forum::class);
    }
    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
    public function resource()
    {
        return $this->hasMany(Resource::class);
    }


}

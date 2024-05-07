<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    
    protected $table = 'department';

    protected $fillable = [
        'name',
        'description',
        'head_id',
    ];

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function departmentCourse()
    {
        return $this->hasMany(DepartmentCourse::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'guardian_id',
    ];

    public function student()
    {
        return $this->hasMany(User::class, 'student_id');
    }
    public function parentGuardian()
    {
        return $this->hasMany(parentGuardian::class, 'student_id');
    }
}

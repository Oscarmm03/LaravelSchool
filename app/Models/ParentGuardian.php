<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentGuardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'relationship',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function parentStudent()
    {
        return $this->hasMany(ParentStudent::class);
    }
}

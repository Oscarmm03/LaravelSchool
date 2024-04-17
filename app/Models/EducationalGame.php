<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'subject_area',
    ];

    public function gameSession()
    {
        return $this->hasMany(GameSession::class);
    }
    
}

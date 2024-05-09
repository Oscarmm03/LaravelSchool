<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameStudent extends Model
{
    use HasFactory;

    protected $table = 'games_students';

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function game()
    {
        return $this->belongsTo(EducationalGame::class, 'educational_game_id', 'id');
    }
}

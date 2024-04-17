<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_id',
        'user_id',
        'content',
    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class. 'forum_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class. 'user_id');
    }
}

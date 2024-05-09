<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'current_team_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relación 1-n
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function assignmentSubmissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
    public function courseEnrollment()
    {
        return $this->hasMany(CourseEnrollment::class, 'user_id');
    }
    public function forumPost()
    {
        return $this->hasMany(ForumPost::class);
    }
    public function gameSession()
    {
        return $this->hasMany(GameSession::class);
    }
    public function parentGuardian()
    {
        return $this->hasMany(ParentGuardian::class);
    }
    public function parentStudent()
    {
        return $this->hasMany(ParentStudent::class);
    }
    public function quizResponse()
    {
        return $this->hasMany(QuizResponse::class);
    }

    public function gameEstudent()
    {
        return $this->hasMany(GameStudent::class);
    }

}

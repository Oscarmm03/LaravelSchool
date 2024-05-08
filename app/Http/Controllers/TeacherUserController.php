<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CourseEnrollment;
use Illuminate\Support\Facades\Auth;

class TeacherUserController extends Controller
{
    public function index()
    {
        $students = User::with('course')->where('current_team_id', '3')->paginate(10);
        return view('Teacher.users-index', ['students' => $students]);
    }
}

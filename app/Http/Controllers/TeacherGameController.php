<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherGameController extends Controller
{
    public function index()
    {
        return view('Teacher.games-index');
    }
}

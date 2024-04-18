<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherSettingsController extends Controller
{
    public function index()
    {
        return view('Teacher.settings-index');
    }
}

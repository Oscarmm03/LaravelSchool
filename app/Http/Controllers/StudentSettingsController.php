<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentSettingsController extends Controller
{
    public function index()
    {
        return view('Student.settings-index');
    }
}

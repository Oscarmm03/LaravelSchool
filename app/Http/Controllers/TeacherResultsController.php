<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherResultsController extends Controller
{
    public function index()
    {
        return view('Teacher.results-index');
    }
}

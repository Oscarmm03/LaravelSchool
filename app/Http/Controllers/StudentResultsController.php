<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentResultsController extends Controller
{
    public function index()
    {
        return view('Student.results-index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentGameController extends Controller
{
    public function index()
    {
        return view('Student.games-index');
    }
}

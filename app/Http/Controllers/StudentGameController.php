<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GameStudent;

class StudentGameController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $games = GameStudent::where('user_id', $user)->with('game')->get();
        return view('Student.games-index', ['games' => $games]);
    }
}

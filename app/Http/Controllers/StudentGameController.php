<?php

namespace App\Http\Controllers;

use App\Models\EducationalGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GameStudent;

class StudentGameController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $gamesStudents = GameStudent::where('user_id', $user)->with('game')->get();
        $games = EducationalGame::all();
        return view('Student.games-index', ['gamesStudents' => $gamesStudents, 'games' => $games]);
    }
}

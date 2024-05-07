<?php

namespace App\Http\Controllers;

use App\Models\EducationalGame;
use Illuminate\Http\Request;

class AdminGameController extends Controller
{
    public function index()
    {
        $games = EducationalGame::all();
        return view('admin.games-index', ['games' => $games]);
    }
}

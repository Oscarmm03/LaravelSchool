<?php

namespace App\Http\Controllers;

use App\Models\GameStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $current_team_id = $user->current_team_id;

        if ($current_team_id == 1) {
            return view('Admin.dashboard');
        } elseif ($current_team_id == 2) {
            return view('Teacher.dashboard');
        } elseif ($current_team_id == 3) {
            $user = Auth::user()->id;
            $games = GameStudent::where('user_id', $user)->where('done', false)->get();
            return view('Student.dashboard', ['games' => $games]);
        } else {
            return view('error.no-role');
        }
    }
}

<?php

namespace App\Http\Controllers;

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
            return view('Student.dashboard');
        } else {
            return view('error.no-role');
        }
    }
}

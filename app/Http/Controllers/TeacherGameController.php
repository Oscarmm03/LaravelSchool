<?php

namespace App\Http\Controllers;

use App\Models\EducationalGame;
use App\Models\GameStudent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseEnrollment;

class TeacherGameController extends Controller
{
    public function index()
    {
        $games = EducationalGame::paginate(10);
        return view('Teacher.games-index', ['games' => $games]);
    }

    public function assignGameUser($id)
    {
        $game = EducationalGame::find($id);
        $students = User::where('current_team_id', 3)->get();
        return view('Teacher.games-assignUser', ['game' => $game, 'students' => $students]);
    }

    public function storeGameUserAssign(Request $request, $id)
    {
        $game = new GameStudent();
        $game->user_id = $request->user_id;
        $game->educational_game_id = $id;
        $game->done = 'false';
        try {
            $game->save();
            return redirect()->route('teacher.games.assignUser', ['id' => $id])->with('success', 'El juego se ha añadido al estudiante correctamente!!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.games.assignUser', ['id' => $id])->with('error', 'Error al asignar el juego al estudiante.');
        }
        return redirect()->route('teacher.games.assignUser');
    }

    public function assignGameCourse($id)
    {
        $game = EducationalGame::find($id);
        $courses = Course::all();
        return view('Teacher.games-assignCourse', ['game' => $game, 'courses' => $courses]);
    }

    public function storeGameCourseAssign(Request $request, $id)
    {
        $courseEnrollments = CourseEnrollment::where('course_id', $request->course_id)->get();

        foreach ($courseEnrollments as $courseEnrollment) {
            $game = new GameStudent();
            $game->user_id = $courseEnrollment->user_id;
            $game->educational_game_id = $request->course_id;
            $game->done = 'false';
            try {
                $game->save();
            } catch (\Exception $e) {
                return redirect()->route('teacher.games.assignCourse', ['id' => $id])->with('error', 'Error al asignar el juego al curso.');
            }
        }
        return redirect()->route('teacher.games.assignCourse', ['id' => $id])->with('success', 'El juego se ha añadido al curso correctamente!!');
    }
}

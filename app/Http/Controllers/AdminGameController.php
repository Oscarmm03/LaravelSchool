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

    public function create()
    {
        return view('admin.games-create');
    }

    public function store(Request $request)
    {
        $game = new EducationalGame();
        $game->title = $request->title;
        $game->description = $request->description;
        $game->url = $request->url;
        $game->subject_area = $request->subject_area;
        try {
            $game->save();
        } catch (\Exception $e) {
            return redirect()->route('admin.games.create')->with('error', 'Error al crear el juego');
        }
        return redirect()->route('admin.games.create')->with('success', 'Juego creado correctamente');
    }

    public function edit($id)
    {
        $game = EducationalGame::find($id);
        return view('admin.games-edit', ['game' => $game]);
    }

    public function update(Request $request, $id)
    {
        $game = EducationalGame::find($id);
        $game->title = $request->title;
        $game->description = $request->description;
        $game->url = $request->url;
        $game->subject_area = $request->subject_area;
        try {
            $game->save();
        } catch (\Exception $e) {
            return redirect()->route('admin.games.edit', ['id' => $id])->with('error', 'Error al editar el juego');
        }
        return redirect()->route('admin.games.edit', ['id' => $id])->with('success', 'Juego editado correctamente');
    }

    public function destroy($id)
    {
        $game = EducationalGame::find($id);
        try {
            $game->delete();
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('admin.games')->with('error', 'Error al eliminar el juego, el juego está siendo utilizado en algún curso');
            }
            return redirect()->route('admin.games')->with('error', 'Error al eliminar el juego');
        }
        return redirect()->route('admin.games')->with('success', 'Juego eliminado correctamente');
    }
}

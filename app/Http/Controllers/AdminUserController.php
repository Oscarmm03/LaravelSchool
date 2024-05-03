<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use App\Actions\Fortify\PasswordValidationRules;
use Exception;

class AdminUserController extends Controller
{
    use PasswordValidationRules;

    public function index()
    {
        $users = User::paginate(10);
        return view('Admin.users-index', ['users' => $users]);
    }

    public function create()
    {
        return view('Admin.users-create');
    }


    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'integer', 'in:1,2,3'],
        ])->validate();

        try {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'current_team_id' => $input['role'],
            ]);
            return redirect()->route('admin.users.create')
                ->with('success', 'User created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.users.create')
                ->with('error', 'Error creating user.');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.users-edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'integer', 'in:1,2,3'],
        ])->validate();

        try {
            $user = User::find($id);
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->current_team_id = $input['role'];
            $user->save();
            return redirect()->route('admin.users.edit', $id)
                ->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.users.edit', $id)
                ->with('error', 'Error updating user.');
        }
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('admin.users')
                ->with('success', 'User deleted succesfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.users')
                ->with('error', 'Error deleting user.');
        }
    }
}

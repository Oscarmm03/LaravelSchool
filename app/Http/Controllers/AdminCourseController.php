<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Department;

class AdminCourseController extends Controller
{
    public function index()
    {   
        $courses = Course::with('teacher', 'department', 'enrollments')->get();
        return view('admin.courses-index', ['courses' => $courses]); 
    }

    public function create()
    {
        $teachers = User::where('current_team_id', 2)->get();
        $departments = Department::all();
        return view('admin.courses-create', [
            'teachers' => $teachers,
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->teacher_id = $request->teacher_id;
        $course->department_id = $request->department_id;
        try {
            $course->save();
            return redirect()->route('admin.courses.create')->with('success', 'Course created successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.courses.create')->with('error', 'An error occurred while creating the course');
        }
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $teachers = User::where('current_team_id', 2)->get();
        $departments = Department::all();
        return view('admin.courses-edit', [
            'course' => $course,
            'teachers' => $teachers,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->teacher_id = $request->teacher;
        $course->department_id = $request->department;
        try {
            $course->save();
            return redirect()->route('admin.courses.edit', $id)->with('success', 'Course updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.courses.edit', $id)->with('error', 'An error occurred while updating the course');
        }
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        try {
            $course->delete();
            return redirect()->route('admin.courses')->with('success', 'Course deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.courses')->with('error', 'An error occurred while deleting the course');
        }
    }

}

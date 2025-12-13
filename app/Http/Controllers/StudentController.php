<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /api/students
    public function index()
    {
        return Student::all();
    }

    // POST /api/students
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:students,email',
        ]);

        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

    // GET /api/students/{id}
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    // PUT /api/students/{id}
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->all());

        return response()->json($student);
    }

    // DELETE /api/students/{id}
    public function destroy($id)
    {
        Student::destroy($id);

        return response()->json(['message' => 'Student deleted']);
    }
}

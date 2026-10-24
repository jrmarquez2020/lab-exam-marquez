<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')
            ->latest()
            ->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        $validated['user_id'] = $request->user()->id;

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $student->load('course');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::all();

        return view('students.edit', compact('student', 'courses'));
    }

   public function update(Request $request, Student $student)
{
    $this->authorize('update', $student);

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],
        'course_id' => ['required', 'exists:courses,id'],
    ]);

    $student->update($validated);

    return redirect()->route('students.index')
        ->with('success', 'Student updated successfully.');
}

    public function destroy(Student $student)
{
    $this->authorize('delete', $student);

    $student->delete();

    return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully.');
}
}
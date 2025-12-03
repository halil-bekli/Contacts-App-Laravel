<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Student;

class StudentsController extends Controller
{
    public function destroy(Student $student)
{
    $student->delete();
    return redirect()->route('students.index')->with('success', 'The student has been marked as deleted.');
}

public function index()
{
    $students = Student::paginate(20); // Only non-removed students
    return view('students.index', compact('students'));
}

public function trashed()
{
     $students = Student::onlyTrashed()->with('city')->paginate(20);
    return view('students.trashed', compact('students'));
}

public function restore($id)
{
    Student::withTrashed()->findOrFail($id)->restore();
    return redirect()->route('students.trashed')->with('success', 'Studentas atkurtas!');
}

public function forceDelete($id)
{
    Student::withTrashed()->findOrFail($id)->forceDelete();
    return redirect()->route('students.trashed')->with('success', 'The student has been permanently removed.');
}



}

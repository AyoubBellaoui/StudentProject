<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        $majors = Major::all();
        return view('Students.create', compact('majors'));
    }

    public function store(Request $request) {

        $request->validate([
            'fullname'         => 'required|min:2',
            'date_of_birth'    => 'required',
            'gender'           => 'required',
            'image'            => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'major_id'         => 'required|exists:majors,id',
        ]);

        Student::create([
            'fullname'         => $request->fullname,
            'date_of_birth'    => $request->date_of_birth,
            'gender'           => $request->gender,
            'image'            => $request->file('image')->store('students', 'public'),
            'major_id'         => $request->major_id,
        ]);

        flash()->success('Student created successfully !');

        return redirect()->route('Homepage');
    }

    public function index() {

        $students = Student::with('major')->get();
        return view('Students.list', compact('students'));
    }

    public function destroy($id) {

        Student::destroy($id);
        flash()->success('Student deleted successfully!');
        return back();
    }
}

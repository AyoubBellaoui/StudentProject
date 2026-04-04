<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('major')->get();
        return view('Students.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $majors = Major::all();
        return view('Students.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        return redirect()->route('student.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::destroy($id);
        flash()->success('Student deleted successfully!');
        return back();
    }
}

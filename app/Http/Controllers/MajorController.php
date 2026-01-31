<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show list of majors table
        $majors = Major::all();
        return view('Majors.list', compact('majors'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // show create Major form
        return view('Majors.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|string|min:2',
        ]);

        // Save to db
        Major::create([
            'name' => $request->name,
        ]);

        // show a message with flasher
        flash()->success('Major created successfully!');

        // Redirect to homepage temp
        return redirect()->route('Major.list');
    }


    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $major = Major::findORFail($id);
        return view('Majors.edit', compact('major'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Major::destroy($id);
        flash()->success('Major deleted successfully!');
        return back();
    }
}

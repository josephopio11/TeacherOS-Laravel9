<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id','desc')->paginate(10);

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:teachers,name',
            'dob' => ''
        ]);

        if ($validated){
            Teacher::create($validated);

            return redirect()->route('teacher.index')->with('message', 'Lesson added successfully');
        }else {
            return redirect()->back()->with('message', 'For sure you have done nothing. Try again!');
        }

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::orderBy('id','desc')->paginate(10);

        $data = Teacher::findOrFail($id);

        return view('teachers.edit', compact(['data', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:teachers,name',
            'dob' => ''
        ]);

        $teacher = Teacher::findOrFail($id);

        if ($validated && $teacher){
            $teacher->update($validated);

            return redirect()->route('teacher.index')->with('message', 'Lesson updated successfully');
        }else {
            return redirect()->back()->with('message', 'For sure you have done nothing. Try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teacher::findOrFail($id);

        $data->delete();

        return redirect()->route('teacher.index')->with('message','Teacher deleted successfully');
    }
}

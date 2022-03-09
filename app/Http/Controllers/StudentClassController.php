<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_classes = StudentClass::orderBy('name','asc')->paginate(13);

        return view('classes.index', compact('student_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
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
            'name' => 'required|unique:student_classes,name',
            'description' => ''
        ]);

        if ($validated){
            StudentClass::create($validated);

            return redirect()->route('class.index')->with('message', 'Lesson added successfully');
        }else {
            return redirect()->back()->with('message', 'For sure you have done nothing. Try again!');
        }

        // dd($validated);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_classes = StudentClass::orderBy('id','desc')->paginate(13);

        $data = StudentClass::findOrFail($id);

        return view('classes.edit', compact(['data', 'student_classes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name',
            'description' => ''
        ]);

        $studentclass = StudentClass::findOrFail($id);

        if ($validated && $studentclass){
            $studentclass->update($validated);

            return redirect()->route('class.index')->with('message', 'Lesson updated successfully');
        }else {
            return redirect()->back()->with('message', 'For sure you have done nothing. Try again!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StudentClass::findOrFail($id);

        $data->delete();

        return redirect()->route('class.index')->with('message', 'studentclass Deleted Successfully');
    }
}

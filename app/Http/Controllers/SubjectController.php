<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('id','desc')->paginate(10);

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
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
            'name' => 'required|unique:subjects,name',
            'description' => ''
        ]);

        if ($validated){
            Subject::create($validated);

            return redirect()->route('subject.index')->with('message', 'Lesson added successfully');
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
        $subjects = Subject::orderBy('id','desc')->paginate(10);

        $data = Subject::findOrFail($id);

        return view('subjects.edit', compact(['data', 'subjects']));
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
            'name' => 'required|unique:subjects,name',
            'description' => ''
        ]);

        $subject = Subject::findOrFail($id);

        if ($validated && $subject){
            $subject->update($validated);

            return redirect()->route('subject.index')->with('message', 'Lesson updated successfully');
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
        $data = Subject::findOrFail($id);

        $data->delete();

        return redirect()->route('subject.index')->with('message', 'Subject Not Deleted Successfully');
    }
}

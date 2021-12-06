<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Student::all();
        return view('student.index', ['students' => Student::orderby('id','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudent $request)
    {
        $validated = $request->validated();

        $student = Student::make($validated);
        $student['visitor'] = $request->ip();
        //dd($student); die();
        $student->save();
        // $student = new Student();
        // $student->roll_no = $validated['roll_no']; 
        // $student->name = $validated['name']; 
        // $student->email = $validated['email']; 
        // $student->gender = $validated['gender']; 
        // $student->year = $validated['year']; 
        // $student->department_id = $validated['department_id']; 
        // $student->address = $validated['address']; 
        // $student->visitor = $request->ip(); 
        // //dd($student); die();
        // $student->save();
        $request->session()->flash('status','Student has been added!');
        return redirect()->route('student.show', ['student' => $student->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('student.show', ['student' => Student::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('student.edit', ['student' => Student::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudent $request, $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validated();
        $student->fill($validated);
        $student['visitor'] = $request->ip();
        //dd($student); die();
        $student->save();
        $request->session()->flash('status','Student has been updated');
        return redirect()->route('student.show', ['student' => $student->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        session()->flash('status','Student has been deleted');
        return redirect()->route('student.index');
    }
}

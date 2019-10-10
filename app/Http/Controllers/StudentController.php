<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\Classes;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user();
        $students = Student::paginate(6);
        $teachers = Teacher::all();
        $classes = Classes::all();
        $cities = City::all();

        return view('students', compact('students', 'teachers', 'classes', 'cities', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user();
        $students = Student::paginate(6);
        $teachers = Teacher::all();
        $classes = Classes::all();
        $cities = City::all();

        return view('write/student', compact('students', 'teachers', 'classes', 'cities', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;

        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'class' => 'required',
            'city' => 'required',
            'teacher' => 'required',
            'address' => 'required'
        ]);

        $student->name             = $request->input('name');
        $student->nik              = $request->input('nik');
        $student->classes_id       = $request->input('class');
        $student->city_id          = $request->input('city');
        $student->teacher_id       = $request->input('teacher');
        $student->address          = $request->input('address');
        if (!$student->save()) {
            return redirect()->back();
        }
        return redirect(route('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'class' => 'required',
            'city' => 'required',
            'teacher' => 'required',
            'address' => 'required'
        ]);
        $student = Student::find($request->id);

        $student->name             = $request->input('name');
        $student->nik              = $request->input('nik');
        $student->classes_id       = $request->input('class');
        $student->city_id          = $request->input('city');
        $student->teacher_id       = $request->input('teacher');
        $student->address          = $request->input('address');
        if (!$student->save()) {
            return redirect()->back();
        }
        return redirect(route('students'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Student::find($id);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }
}

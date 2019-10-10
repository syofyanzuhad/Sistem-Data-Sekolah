<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\Classes;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user();
        $teachers = Teacher::paginate(6);
        $students = Student::all();
        $classes = Classes::all();
        $cities = City::all();

        return view('teachers', compact('students', 'teachers', 'classes', 'cities', 'user_id'));
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

        return view('write/teacher', compact('students', 'teachers', 'classes', 'cities', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher;
        
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);
            
        $teacher->teacher_name = $request->input('name');
        $teacher->job          = $request->input('job');
        $teacher->cities_id    = $request->input('city');
        $teacher->address      = $request->input('address');
        if (!$teacher->save()) {
            return redirect()->back();
        }
        return redirect(route('teachers'));
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
            'job' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);
        $teacher = Teacher::find($request->id);
        
        $teacher->teacher_name = $request->input('name');
        $teacher->job          = $request->input('job');
        $teacher->cities_id    = $request->input('city');
        $teacher->address      = $request->input('address');
        if (!$teacher->save()) {
            return redirect()->back();
        }
        return redirect(route('teachers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Teacher::find($id);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }
}

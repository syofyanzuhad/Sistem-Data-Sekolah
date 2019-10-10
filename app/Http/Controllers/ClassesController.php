<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\Classes;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user();
        $classes = Classes::paginate(6);  
        // $classes = usort((array)$classes, 'id');      
        $cities = City::all();

        return view('classes', compact( 'classes', 'cities', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('write/class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new Classes;

        $class->class = $request->input('class');
        if (!$class->save()) {
            return redirect()->back();
        }
        return redirect(route('classes'));
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
        // dd($request->class);
        $request->validate([
            'class' => 'required'
        ]);
        $class_name = Classes::find($request->id);
        $class_name->class = $request->input('class');
        if (!$class_name->save()) {
            return redirect()->back();
        }
        return redirect(route('classes'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Classes::find($id);
        if ($delete->delete()) {
            return redirect()->back();
        }
    }
}

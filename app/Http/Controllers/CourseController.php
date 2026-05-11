<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(){

    $courses = Course::all();
    return view('course.index', compact('courses'));
    }
    public function create (){
        return view('course.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'path' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $course = new Course();
        $course->name = $request->input('name');
        $course->path = $request->input('path');
        $course->price = $request->input('price');
        if($request->hasFile('image')){
            $image_name = time().'_'.request->file('image')->extendsion();
            $request->file('image')->move(public_path('images'), $image_name);
            $course->image = $image_name;
        }
        $course->save();
    }
}

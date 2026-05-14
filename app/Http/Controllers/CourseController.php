<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'path' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $course = new Course();

        $course->course_name = $request->course_name;
        $course->path = $request->path;
        $course->price = $request->price;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $image_name = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $image_name);

            $course->image = $image_name;
        }

        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required',
            'path' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $course = Course::findOrFail($id);

        $course->course_name = $request->course_name;
        $course->path = $request->path;
        $course->price = $request->price;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $image_name = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $image_name);

            $course->image = $image_name;
        }

        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }
}
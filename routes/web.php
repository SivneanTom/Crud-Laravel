<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
// use App\Models\Course;
Route::get('/', function () {
    return redirect()->route('courses.index');
});
Route::resource('courses', CourseController::class);
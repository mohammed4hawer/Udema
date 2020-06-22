<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Review;
use App\CourseEnroll;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderby('id','desc')->get();
        $categories = Category::all();
        return view('Website.Courses.index')
        ->with('courses', $courses)->with('categories', $categories);

    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('Website.Courses.show')
        ->with('course', $course);
    }

    public function enroll($course_id)
    {
        if(!auth()->check()) return redirect(route('login'));
        $course = Course::findOrFail($course_id);
        $course_enrolled = Course::Enrolled()->first();
        if ($course_enrolled) return back();

        CourseEnroll::create([
            'course_id'=>$course_id,
            'user_id'=>auth()->user()->id,
            'is_confirmed'=>0
        ]);

      return back();

    }

}

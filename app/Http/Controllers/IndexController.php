<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class IndexController extends Controller
{
    public function index()
   {
      $courses = Course::all();
      return view('website.main')->with('courses', $courses);
   }
}

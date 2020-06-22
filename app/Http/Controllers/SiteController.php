<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Post;

class SiteController extends Controller
{
    public function index()
   {
      $courses = Course::all();
      $categories = Category::all();
      $posts = Post::all();
      return view('website.main')->with('courses', $courses)
      ->with('categories', $categories)
      ->with('posts', $posts);
   }
   public function about()
   {
       return view('website.about');
   }
   public function contact()
    {
        return view('website.contact');
    }
}

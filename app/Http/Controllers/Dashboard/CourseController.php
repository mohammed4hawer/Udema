<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:191',
            'image'=>'rquired|file|max:2048|mimes:png,jpeg,jpg',
            'short_description'=>'required',
            'long_description'=>'required',
            'price'=>'required|decimal',
            'category_id'=>'required|string|max:191',
        ]);
        $inputes = $request->except(['image']);
        if ($request->hasFile('image')) {
            $inputes['image'] = uploader($request, 'image');
        }
        Course::create($inputes);
        return redirect(route('dashboard.courses.index'))->with('success', 'You Have Added New Course Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|string|max:191',
            'image'=>'rquired|file|max:2048|mimes:png,jpeg,jpg',
            'short_description'=>'required',
            'long_description'=>'sometimes',
            'price'=>'required|decimal',
            'category_id'=>'required|string|max:191',
        ]);
        $inputes = $request->except(['image']);
        if ($request->hasFile('image')) {
            $inputes['image'] = uploader($request, 'image');
        }
        Course::find($id)->update($inputes);
        return redirect(route('dashboard.courses.index'))->with('success', 'You Have Updated This Course Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if(!$course) return back()->with('error', 'Course Does not Exist!');
        $course->delete();
        return redirect(route('dashboard.courses.index'))->with('success', 'Course Deleted Successfully.');

    }
}

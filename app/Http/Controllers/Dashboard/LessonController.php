<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::orderBy('course_id', 'asc')->get();
        return view('dashboard.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lessons.create');
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
            'url'=>'required|url|unique:lessons,url',
            'duration'=>'required|date',
            'course_id'=>'required|string|max:191',
        ]);

        $inputes = $request->all();
        Lesson::create($inputes);
        return redirect(route('dashboard.lessons.index'))->with('success', 'You Have Added New Lesson Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('dashboard.lessons.show', compact('lesson'));

        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('dashboard.lessons.edit', compact('lesson'));
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
        $this->validate($request, [
            'name'=>'required|string|max:191',
            'url'=>'required|url|unique:lessons,url',
            'duration'=>'required|date',
            'course_id'=>'required|string|max:191',
        ]);

        $inputes = $request->all();
        Lesson::find($id)->update($inputes);
        return redirect(route('dashboard.lessons.index'))->with('success', 'You Have Updated This Lesson Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson) return back()->with('error', 'Lesson Does not Exist!');
        $lesson->delete();
        return redirect(route('dashboard.lessons.index'))->with('success', 'Lesson Deleted Successfully.');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $categories = Category::orderBy('id', 'desc')->get();
          return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'image'=>'required|file|max:2048|mimes:png,jpeg,jpg',
        ]);

        $inputes = $request->except(['image']);
        if ($request->hasFile('image')) {
            $inputes['image'] = uploader($request, 'image');
        }
        Category::create($inputes);
        return redirect(route('dashboard.categories.index'))->with('success', 'You Have Added New Category Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
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
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|string|max:191',
            'image'=>'required|file|max:2048',
        ]);
        $inputes = $request->except(['image']);
        if ($request->hasFile('image')) {
            $inputes['image'] = uploader($request, 'image');
        }
        Category::find($id)->update($inputes);
        return redirect(route('dashboard.categories.index'))->with('success', 'You Have Updated This Category Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category)  return back()->with('error','Category Does Not Exist!');
        $category->delete();
        return redirect(route('dashboard.categories.index'))->with('success', 'Category Deleted Successfully.');
    }
}

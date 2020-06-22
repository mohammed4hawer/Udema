<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
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
            'email'=>'required|email|max:191|unique:users,email',
            'phone'=>'required|string|max:191|unique:users,phone',
            'password'=>'required|min:6|max:191|confirmed',
            'image'=>'nullable|file|max:2048|mimes:png,jpg,jpeg',
            'is_active'=>'required|boolean',
            'role'=>'required|string|in:user,admin',
        ]);
        $inputes = $request->except(['image','password','_token','password_confirmation']);
        if ($request->hasFile('image')) {
            $inputes['image'] = uploader($request, 'image');
        }
        $inputes['password'] = Hash::make($request->password);
        User::create($inputes);
        return redirect(route('dashboard.users.index'))->with('success', 'You Have Added New User Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|string|max:191|',
            'email'=>'required|email|max:191|unique:users,email,'.$user->id,
            'phone'=>'required|max:191|unique:users,phone,'.$user->id,
            'password'=>'required|min:6|confirmed',
            'image'=>'required|sometimes|file|max:2048',
            'is_active'=>'required|boolean',
            'role'=>'required|in:admin,user',
        ]);

        $inputes = $request->except(['image', 'password']);

        if ($request->hasFile('image')) {
            $inputes['image'] = uploader($request,'image');
        }
        if ($request->has('password') && $request->password != "") {
            $inputes['password'] = Hash::make($request->password);
        }
        User::find($id)->update($inputes);
        return redirect(route('dashboard.users.index'))
        ->with('success', 'You Have Updated This User Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user) return back()->with('error', 'User Is Not Found!');
        if(auth()->user()->id == $user->id) return back()->with('error', 'You Cannot Delete Your Membership!');
        $user->delete();
        return redirect(route('dashboard.users.index'))
        ->with('success', 'User Deleted Successfully.');
    }
}

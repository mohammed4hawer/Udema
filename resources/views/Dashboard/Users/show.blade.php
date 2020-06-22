@extends('Dashboard.Layouts.layout')

@section('title')
    User Settings
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Editing One User</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="bg-blue">
                    <th>#</th>
                    <th>First Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td><img src="{{asset('website/img/'.$user->image)}}" alt="" style="width: 80px; height: 80px"></td>
                    <td>{{$user->role}}</td>
                    <td>
                    <a href="{{route('dashboard.users.edit', $user->id)}}" class="btn btn-info"><i class="fa fa-user-edit">&nbsp;</i>Edit User</a></<a><span>&nbsp;</span>
                    <a href="{{route('dashboard.users.user_destroy', $user->id)}}" class="btn btn-danger"><i class="fa fa-user-minus">&nbsp;</i>Delete User</a></<a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /table header styling -->

@endsection

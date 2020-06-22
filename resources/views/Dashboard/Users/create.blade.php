@extends('Dashboard.Layouts.layout')

@section('title')
    Add New User
@endsection

@section('content')
<!-- Input group addons -->
<div class="panel panel-flat">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route'=>'dashboard.users.store','method'=>'POST','files'=>true]) !!}

@include('Dashboard.Layouts.form')

{!! Form::close() !!}
</div>
<!-- /input group addons -->

@endsection

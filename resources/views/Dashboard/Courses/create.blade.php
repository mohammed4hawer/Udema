@extends('Dashboard.Layouts.layout')

@section('title')
    Add New Category
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

{!! Form::open(['route'=>['dashboard.courses.store'], 'method'=>'POST', 'files'=>true]) !!}

@include('Dashboard.Layouts.courseform')

{!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection

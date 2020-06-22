@extends('Dashboard.Layouts.layout')

@section('title')
    Editing {{$course->name}}
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
{!! Form::model($course, ['route'=>['dashboard.courses.update',$course->id], 'method'=>'PATCH', 'files'=>true]) !!}
@csrf
@include('Dashboard.Layouts.courseform')

{!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection

@extends('Dashboard.Layouts.layout')

@section('title')
    Editing {{$lesson->name}}
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

{!! Form::model($lesson, ['route'=>['dashboard.lessons.update', $lesson->id],'method'=>'PATCH',]) !!}
@csrf
@include('Dashboard.Layouts.lessonform')

{!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection

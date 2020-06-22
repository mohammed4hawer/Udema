@extends('Dashboard.Layouts.layout')

@section('title')
    Lesson Settings
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
        <h5 class="panel-title">Editing One Lesson</h5>
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
                    <th>Lesson Name</th>
                    <th>Lesson URL</th>
                    <th>Lesson Duration</th>
                    <th>Course Lesson</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$lesson->id}}</td>
                    <td>{{$lesson->name}}</td>
                    <td>{{$lesson->url}}</td>
                    <td>{{\Carbon\Carbon::parse($lesson->duration)->format('i:s')}}</td>
                    <td>{{courseId()[$lesson->course_id]}}</td>
                    <td>
                    <a href="{{route('dashboard.lessons.edit', $lesson->id)}}" class="btn btn-info"><i class="fas fa-edit">&nbsp;</i>Edit Lesson</a><span>&nbsp;</span>
                    <a href="{{route('dashboard.lessons.lesson_destroy', $lesson->id)}}" class="btn btn-danger"><i class="fas fa-minus">&nbsp;</i>Delete Lesson</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /table header styling -->
@endsection

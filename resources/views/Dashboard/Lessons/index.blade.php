@extends('Dashboard.Layouts.layout')

@section('title')
    All Lessons
@endsection

@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <p class="panel-title">You Can Show All Lessons And performs All operations like search , Edit , show And Delete.</p>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table datatable-button-init-basic">
            <thead>
                <tr class="bg-blue">
                    <th>No#</th>
                    <th>Lesson Name</th>
                    <th>Lesson URL</th>
                    <th>Lesson Duration</th>
                    <th>Course Lesson</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($lessons as $lesson)
                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{route('dashboard.lessons.show', $lesson->id)}}">{{$lesson->name}}</a></td>
                    <td>{{$lesson->url}}</td>
                    <td>{{\Carbon\Carbon::parse($lesson->duration)->format('i:s')}}</td>
                    <td>{{courseId()[$lesson->course_id]}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <br><br>
<!-- /table header styling -->

@endsection

@extends('Dashboard.Layouts.layout')

@section('title')
       Course Settings
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
        <h5 class="panel-title">Editing One Course</h5>
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
                    <th>Course Name</th>
                    <th>Course Image</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Course Price</th>
                    <th>Course Category</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->name}}</td>
                    <td><img src="{{getimage($course->image)}}" alt="" style="width: 80px; height: 80px"></td>
                    <td>{{Str::limit($course->short_description,60)}}</td>
                    <td>{{Str::limit($course->long_description,80)}}</td>
                    <td>${{$course->price}}</td>
                    <td>{{categoryId()[$course->category_id]}}</td>
                    <td>
                    <a href="{{route('dashboard.courses.edit', $course->id)}}" class="btn btn-info"><i class="fas fa-edit">&nbsp;</i>Edit course</a></<a><span>&nbsp;</span>
                    <a href="{{route('dashboard.courses.course_destroy', $course->id)}}" class="btn btn-danger"><i class="fas fa-minus-square">&nbsp;</i>Delete course</a></<a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /table header styling -->

@endsection

@extends('Dashboard.Layouts.layout')

@section('title')
    All Courses
@endsection

@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <p class="panel-title">You Can Show All Courses And performs All operations like search , Edit , show And Delete.</p>
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
                    <th>Name</th>
                    <th>Image</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($courses as $course)
                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{route('dashboard.courses.show', $course->id)}}">{{$course->name}}</a></td>
                    <td><img src="{{getimage($course->image)}}" alt="" style="width: 80px; height: 80px"></td>
                    <td>{{$course->short_description}}</td>
                    <td>{{Str::limit($course->long_description,120)}}</td>
                    <td>${{$course->price}}</td>
                    <td>{{categoryId()[$course->category_id]}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <br><br>
<!-- /table header styling -->


@endsection

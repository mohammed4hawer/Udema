@extends('Dashboard.Layouts.layout')

@section('title')
    All Categories
@endsection

@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <p class="panel-title">You Can Show All Categories And performs All operations like search , Edit , show And Delete.</p>
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
                    <th>Category Name</th>
                    <th>Category Image</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{route('dashboard.categories.show', $category->id)}}">{{$category->name}}</a></td>
                    <td><img src="{{getimage($category->image)}}" alt="" style="width: 80px; height: 80px"></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <br><br>
<!-- /table header styling -->
@endsection

@extends('Dashboard.Layouts.layout')

@section('title')
    Category Settings
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
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><img src="{{getimage($category->image)}}" alt="" style="width: 80px; height: 80px"></td>
                    <td>
                    <a href="{{route('dashboard.categories.edit', $category->id)}}" class="btn btn-info"><i class="fas fa-edit">&nbsp;</i>Edit Category</a></<a><span>&nbsp;</span>
                    <a href="{{route('dashboard.categories.category_destroy', $category->id)}}" class="btn btn-danger"><i class="fas fa-minus-square">&nbsp;</i>Delete Category</a></<a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /table header styling -->

@endsection

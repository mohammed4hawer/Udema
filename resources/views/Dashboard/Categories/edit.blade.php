@extends('Dashboard.Layouts.layout')

@section('title')
    Editing {{$category->name}}
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
{!! Form::model($category, ['route'=>['dashboard.categories.update',$category->id],'method'=>'PATCH', 'files'=>true]) !!}
@csrf
@include('Dashboard.Layouts.categoryform')

{!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection

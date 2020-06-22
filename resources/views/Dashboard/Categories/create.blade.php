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
{!! Form::open(['route'=>['dashboard.categories.store'], 'method'=>'POST', 'files'=>true]) !!}

@include('Dashboard.Layouts.categoryform')

{!! Form::close() !!}

</div>
<!-- /input group addons -->
@endsection

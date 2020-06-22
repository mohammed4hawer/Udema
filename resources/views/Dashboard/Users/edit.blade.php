@extends('Dashboard.Layouts.layout')

@section('title')
    Editing {{$user->name}}
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
{!! Form::model($user, ['route'=>['dashboard.users.update', $user->id], 'method'=>'PATCH', 'files'=>true] ) !!}
@csrf
@include('Dashboard.Layouts.form')

{!! Form::close() !!}
</div>
<!-- /input group addons -->
@endsection

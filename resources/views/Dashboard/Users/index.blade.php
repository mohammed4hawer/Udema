@extends('Dashboard.Layouts.layout')

@section('title')
    All Users
@endsection

@section('content')

<div class="panel panel-flat">
    <div class="panel-heading">
        <p class="panel-title">You Can Show All Users And performs All operations like search , Edit , show And Delete.</p>
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
                    <th>First Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Active Status</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($users as $user)
                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{route('dashboard.users.show', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td><img src="{{getimage($user->image)}}" alt="" style="width: 80px; height: 80px"></td>
                <td>{{statusArray()[$user->is_active]}}</td>
                    <td>{{$user->role}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<br><br>
<!-- /table header styling -->

@endsection

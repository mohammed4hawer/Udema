@extends('Dashboard.Layouts.layout')

@section('title')
    All Messages
@endsection

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <p class="panel-title">You Can Show All Messages And performs All operations like search , show And Delete.</p>
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
                    <th>User Name</th>
                    <th>User E-mail</th>
                    <th>User Phone</th>
                    <th>User Message</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($messages as $message)
                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{route('dashboard.message.show',$message->id)}}">{{$message->name}}</a></td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>{{Str::limit($message->message,80)}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <br><br>
</div>
<!-- /table header styling -->
@endsection

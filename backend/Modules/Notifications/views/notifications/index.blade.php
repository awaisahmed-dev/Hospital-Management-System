@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Notifications</h2>

<a href="{{ route('notifications.create') }}"
class="btn btn-success">

Add Notification

</a>

</div>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>No</th>
<th>Title</th>
<th>Module</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($notifications as $notification)

<tr>

<td>{{ $notification->id }}</td>
<td>{{ $notification->notification_no }}</td>
<td>{{ $notification->title }}</td>
<td>{{ $notification->module_name }}</td>
<td>{{ $notification->status }}</td>

<td>

<a href="{{ route('notifications.show',$notification->id) }}"
class="btn btn-info btn-sm">View</a>

<a href="{{ route('notifications.edit',$notification->id) }}"
class="btn btn-primary btn-sm">Edit</a>

</td>

</tr>

@endforeach

</table>

{{ $notifications->links() }}

@endsection
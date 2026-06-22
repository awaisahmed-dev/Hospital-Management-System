@extends('layouts.backend')

@section('content')

<h2>Notification Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $notification->id }}</td>
</tr>

<tr>
<th>Notification No</th>
<td>{{ $notification->notification_no }}</td>
</tr>

<tr>
<th>Title</th>
<td>{{ $notification->title }}</td>
</tr>

<tr>
<th>Message</th>
<td>{{ $notification->message }}</td>
</tr>

<tr>
<th>Module</th>
<td>{{ $notification->module_name }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $notification->status }}</td>
</tr>

</table>

@endsection
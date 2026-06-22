@extends('layouts.backend')

@section('content')

<h2>Edit Notification</h2>

<form method="POST"
action="{{ route('notifications.update',$notification->id) }}">

@csrf
@method('PUT')

<input type="text"
name="notification_no"
value="{{ $notification->notification_no }}"
class="form-control mb-3">

<input type="text"
name="title"
value="{{ $notification->title }}"
class="form-control mb-3">

<textarea
name="message"
class="form-control mb-3">{{ $notification->message }}</textarea>

<button class="btn btn-success">

Update Notification

</button>

</form>

@endsection
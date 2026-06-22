@extends('layouts.backend')

@section('content')

<h2>Create Notification</h2>

<form method="POST"
action="{{ route('notifications.store') }}">

@csrf

<input type="text"
name="notification_no"
placeholder="Notification No"
class="form-control mb-3">

<input type="text"
name="title"
placeholder="Title"
class="form-control mb-3">

<textarea
name="message"
placeholder="Message"
class="form-control mb-3"></textarea>

<input type="text"
name="module_name"
placeholder="Module"
class="form-control mb-3">

<button class="btn btn-success">

Save Notification

</button>

</form>

@endsection
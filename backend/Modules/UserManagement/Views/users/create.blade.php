@extends('layouts.backend')

@section('content')

<h2>Create User</h2>

<form method="POST"
action="{{ route('user.store') }}">

@csrf

<div class="mb-3">

<label>Name</label>

<input type="text"
name="name"
class="form-control">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
name="email"
class="form-control">

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
name="password"
class="form-control">

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active">
Active
</option>

<option value="inactive">
Inactive
</option>

</select>

</div>

<button class="btn btn-success">
Save User
</button>
<a href="{{ route('user.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

@endsection
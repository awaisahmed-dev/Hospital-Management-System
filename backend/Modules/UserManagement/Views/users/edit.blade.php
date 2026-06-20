@extends('layouts.backend')

@section('content')

<h2>Edit User</h2>

<form method="POST"
action="{{ route('user.update',$user->id) }}">

@csrf
@method('PUT')

<div class="mb-3">

<label>Name</label>

<input type="text"
name="name"
value="{{ $user->name }}"
class="form-control">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
name="email"
value="{{ $user->email }}"
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

<option value="active"
{{ $user->status=='active' ? 'selected' : '' }}>
Active
</option>

<option value="inactive"
{{ $user->status=='inactive' ? 'selected' : '' }}>
Inactive
</option>

</select>

</div>

<button class="btn btn-primary">
Update User
</button>
<a href="{{ route('user.index') }}"
class="btn btn-secondary">

Back

</a>
</form>

@endsection
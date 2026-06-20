@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Users</h2>

<a href="{{ route('user.create') }}"
class="btn btn-success">
Add User
</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search User">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($users as $user)

<tr>

<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->status }}</td>

<td>

<a href="{{ route('user.show',$user->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('user.edit',$user->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('user.destroy',$user->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $users->links() }}

@endsection
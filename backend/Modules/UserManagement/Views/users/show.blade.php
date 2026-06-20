@extends('layouts.backend')

@section('content')

<h2>User Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $user->id }}</td>
</tr>

<tr>
<th>Name</th>
<td>{{ $user->name }}</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $user->email }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $user->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $user->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $user->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $user->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $user->updated_at }}</td>
</tr>

</table>

<a href="{{ route('user.index') }}"
class="btn btn-secondary">

Back

</a>

@endsection
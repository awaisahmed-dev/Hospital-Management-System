@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>HRM Departments</h2>

<a href="{{ route('hrmdepartments.create') }}"
class="btn btn-success">

Add Department

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
placeholder="Search Department"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Department Name</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($departments as $department)

<tr>

<td>{{ $department->id }}</td>

<td>{{ $department->department_name }}</td>

<td>{{ $department->status }}</td>

<td>

<a href="{{ route('hrmdepartments.show',$department->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('hrmdepartments.edit',$department->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('hrmdepartments.destroy',$department->id) }}"
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

{{ $departments->links() }}

@endsection
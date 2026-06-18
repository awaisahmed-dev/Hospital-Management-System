@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Department</h2>

<a href="{{ route('departments.create') }}"
class="btn btn-success">
Add Department
</a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Department"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>Department Code</th>
<th>Name</th>
<th>Head Of Department</th>
<th>phone</th>
<th>location</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($departments as $department)

<tr>

<td>{{ $department->department_code }}</td>

<td>
{{ $department->name }}
</td>

<td>{{ $department->head_of_department }}</td>

<td>{{ $department->phone }}</td>

<td>{{ $department->location }}</td>

<td>{{ $department->status }}</td>

<td>

<a href="{{ route('departments.show',$department->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('departments.edit',$department->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form
action="{{ route('departments.destroy',$department->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<!-- <button class="btn btn-danger btn-sm">
Delete
</button> -->
<button
onclick="return confirm('Delete this department?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $departments->links() }}

@endsection
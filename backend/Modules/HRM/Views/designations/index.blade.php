@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Designations</h2>

<a href="{{ route('designations.create') }}"
class="btn btn-success">

Add Designation

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search Designation">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Department</th>
<th>Designation</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($designations as $designation)

<tr>

<td>{{ $designation->id }}</td>

<td>
{{ $designation->department->department_name ?? '' }}
</td>

<td>
{{ $designation->designation_name }}
</td>

<td>
{{ $designation->status }}
</td>

<td>

<a href="{{ route('designations.show',$designation->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('designations.edit',$designation->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('designations.destroy',$designation->id) }}"
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

{{ $designations->links() }}

@endsection
@extends('layouts.backend')

@section('content')

<h2>Designation Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $designation->id }}</td>
</tr>

<tr>
<th>Department</th>
<td>
{{ $designation->department->department_name ?? '' }}
</td>
</tr>

<tr>
<th>Designation Name</th>
<td>{{ $designation->designation_name }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $designation->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $designation->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $designation->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $designation->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $designation->updated_at }}</td>
</tr>

</table>

<a href="{{ route('designations.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
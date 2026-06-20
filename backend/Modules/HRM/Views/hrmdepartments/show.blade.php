@extends('layouts.backend')

@section('content')

<h2>HRM Department Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $department->id }}</td>
</tr>

<tr>
<th>Department Name</th>
<td>{{ $department->department_name }}</td>
</tr>

<tr>
<th>Description</th>
<td>{{ $department->description }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $department->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $department->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $department->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $department->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $department->updated_at }}</td>
</tr>

</table>

<a href="{{ route('hrmdepartments.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
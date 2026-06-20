@extends('layouts.backend')

@section('content')

<h2>Employee Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $employee->id }}</td>
</tr>

<tr>
<th>Employee Code</th>
<td>{{ $employee->employee_code }}</td>
</tr>

<tr>
<th>Name</th>
<td>
{{ $employee->first_name }}
{{ $employee->last_name }}
</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $employee->email }}</td>
</tr>

<tr>
<th>Phone</th>
<td>{{ $employee->phone }}</td>
</tr>

<tr>
<th>Department</th>
<td>
{{ $employee->department->department_name ?? '' }}
</td>
</tr>

<tr>
<th>Designation</th>
<td>
{{ $employee->designation->designation_name ?? '' }}
</td>
</tr>

<tr>
<th>Salary</th>
<td>{{ $employee->salary }}</td>
</tr>

<tr>
<th>Joining Date</th>
<td>{{ $employee->joining_date }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $employee->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $employee->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $employee->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $employee->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $employee->updated_at }}</td>
</tr>

</table>

<a href="{{ route('employees.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
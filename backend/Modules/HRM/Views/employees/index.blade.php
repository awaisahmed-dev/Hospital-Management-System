@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Employees</h2>

<a href="{{ route('employees.create') }}"
class="btn btn-success">

Add Employee

</a>

</div>

<form method="GET"
class="mt-3">

<input type="text"
name="search"
placeholder="Search Employee"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Code</th>
<th>Name</th>
<th>Department</th>
<th>Designation</th>
<th>Salary</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($employees as $employee)

<tr>

<td>{{ $employee->id }}</td>

<td>{{ $employee->employee_code }}</td>

<td>
{{ $employee->first_name }}
{{ $employee->last_name }}
</td>

<td>
{{ $employee->department->department_name ?? '' }}
</td>

<td>
{{ $employee->designation->designation_name ?? '' }}
</td>

<td>{{ $employee->salary }}</td>

<td>{{ $employee->status }}</td>

<td>

<a href="{{ route('employees.show',$employee->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('employees.edit',$employee->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('employees.destroy',$employee->id) }}"
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

{{ $employees->links() }}

@endsection
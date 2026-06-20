@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Payrolls</h2>

<a href="{{ route('payrolls.create') }}"
class="btn btn-success">

Add Payroll

</a>

</div>

<form method="GET"
class="mt-3">

<input type="text"
name="search"
placeholder="Search Payroll"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Payroll No</th>
<th>Employee</th>
<th>Salary</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($payrolls as $payroll)

<tr>

<td>{{ $payroll->id }}</td>
<td>{{ $payroll->payroll_no }}</td>
<td>{{ $payroll->employee_name }}</td>
<td>{{ $payroll->salary }}</td>
<td>{{ $payroll->payroll_date }}</td>
<td>{{ $payroll->status }}</td>

<td>

<a href="{{ route('payrolls.show',$payroll->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('payrolls.edit',$payroll->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('payrolls.destroy',$payroll->id) }}"
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

{{ $payrolls->links() }}

@endsection
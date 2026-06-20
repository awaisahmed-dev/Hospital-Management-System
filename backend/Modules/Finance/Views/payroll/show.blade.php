@extends('layouts.backend')

@section('content')

<h2>Payroll Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $payroll->id }}</td>
</tr>

<tr>
<th>Payroll No</th>
<td>{{ $payroll->payroll_no }}</td>
</tr>

<tr>
<th>Employee Name</th>
<td>{{ $payroll->employee_name }}</td>
</tr>

<tr>
<th>Salary</th>
<td>{{ $payroll->salary }}</td>
</tr>

<tr>
<th>Payroll Date</th>
<td>{{ $payroll->payroll_date }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $payroll->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $payroll->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $payroll->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $payroll->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $payroll->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $payroll->updated_at }}</td>
</tr>

</table>

<a href="{{ route('payrolls.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
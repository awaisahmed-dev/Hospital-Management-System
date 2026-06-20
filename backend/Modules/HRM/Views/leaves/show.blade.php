@extends('layouts.backend')

@section('content')

<h2>Leave Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $leave->id }}</td>
</tr>

<tr>
<th>Leave No</th>
<td>{{ $leave->leave_no }}</td>
</tr>

<tr>
<th>Employee</th>
<td>{{ $leave->employee->first_name ?? '' }}</td>
</tr>

<tr>
<th>From Date</th>
<td>{{ $leave->from_date }}</td>
</tr>

<tr>
<th>To Date</th>
<td>{{ $leave->to_date }}</td>
</tr>

<tr>
<th>Reason</th>
<td>{{ $leave->reason }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $leave->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $leave->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $leave->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $leave->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $leave->updated_at }}</td>
</tr>

</table>

<a href="{{ route('leaves.index') }}"
class="btn btn-secondary">

Back

</a>

@endsection
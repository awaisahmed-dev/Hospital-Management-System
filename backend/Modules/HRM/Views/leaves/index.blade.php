@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Leaves</h2>

<a href="{{ route('leaves.create') }}"
class="btn btn-success">

Add Leave

</a>

</div>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Leave No</th>
<th>Employee</th>
<th>From Date</th>
<th>To Date</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($leaves as $leave)

<tr>

<td>{{ $leave->id }}</td>

<td>{{ $leave->leave_no }}</td>

<td>
{{ $leave->employee->first_name ?? '' }}
</td>

<td>{{ $leave->from_date }}</td>

<td>{{ $leave->to_date }}</td>

<td>{{ $leave->status }}</td>

<td>

<a href="{{ route('leaves.show',$leave->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('leaves.edit',$leave->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('leaves.destroy',$leave->id) }}"
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

{{ $leaves->links() }}

@endsection
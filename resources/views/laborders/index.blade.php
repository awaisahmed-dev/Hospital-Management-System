@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Lab Orders</h2>

<a href="{{ route('laborders.create') }}"
class="btn btn-success">
Add Lab Order </a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Lab Order"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>No</th>
<th>Lab Order No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Test Name</th>
<th>Fee</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($laborders as $laborder)

<tr>

<td>{{ $laborder->id }}</td>

<td>{{ $laborder->lab_order_no }}</td>

<td>{{ $laborder->patient_id }}</td>

<td>{{ $laborder->doctor_id }}</td>

<td>{{ $laborder->test_name }}</td>

<td>{{ $laborder->test_fee }}</td>

<td>{{ $laborder->status }}</td>

<td>

<a href="{{ route('laborders.show',$laborder->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('laborders.edit',$laborder->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form
action="{{ route('laborders.destroy',$laborder->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete Lab Order?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $laborders->links() }}

@endsection

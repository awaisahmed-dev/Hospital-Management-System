@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Prescriptions</h2>

<a href="{{ route('prescriptions.create') }}"
class="btn btn-success">
Add Prescription
</a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Prescription">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>No</th>
<th>Prescription No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($prescriptions as $prescription)

<tr>

<td>{{ $prescription->id }}</td>

<td>{{ $prescription->prescription_no }}</td>

<td>{{ $prescription->patient_id }}</td>

<td>{{ $prescription->doctor_id }}</td>

<td>{{ $prescription->prescription_date }}</td>

<td>{{ $prescription->status }}</td>

<td>

<a href="{{ route('prescriptions.show',$prescription->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('prescriptions.edit',$prescription->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form
method="POST"
action="{{ route('prescriptions.destroy',$prescription->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete Prescription?')"
class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $prescriptions->links() }}

@endsection
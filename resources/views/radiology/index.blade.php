INDEX FILE

@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Radiology</h2>

<a href="{{ route('radiology.create') }}"
class="btn btn-success">
Add Radiology </a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Radiology"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>No</th>
<th>Radiology No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Scan Name</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($radiologies as $radiology)

<tr>

<td>{{ $radiology->id }}</td>
<td>{{ $radiology->radiology_no }}</td>
<td>{{ $radiology->patient_id }}</td>
<td>{{ $radiology->doctor_id }}</td>
<td>{{ $radiology->scan_name }}</td>
<td>{{ $radiology->status }}</td>

<td>

<a href="{{ route('radiology.show',$radiology->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('radiology.edit',$radiology->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form action="{{ route('radiology.destroy',$radiology->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete this record?')"
class="btn btn-danger btn-sm">
Delete </button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $radiologies->links() }}

@endsection

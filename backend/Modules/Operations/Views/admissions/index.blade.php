@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Admissions</h2>

<a href="{{ route('admissions.create') }}"
class="btn btn-success">

Add Admission

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
placeholder="Search Admission"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Admission No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($admissions as $admission)

<tr>

<td>{{ $admission->id }}</td>

<td>{{ $admission->admission_no }}</td>

<td>
{{ $admission->patient->first_name ?? '' }}
{{ $admission->patient->last_name ?? '' }}
</td>

<td>
{{ $admission->doctor->first_name ?? '' }}
{{ $admission->doctor->last_name ?? '' }}
</td>

<td>{{ $admission->admission_date }}</td>

<td>{{ $admission->status }}</td>

<td>

<a href="{{ route('admissions.show',$admission->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('admissions.edit',$admission->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form method="POST"
action="{{ route('admissions.destroy',$admission->id) }}"
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

{{ $admissions->links() }}

@endsection

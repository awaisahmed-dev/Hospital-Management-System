@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Patient</h2>

<a href="{{ route('patients.create') }}"
class="btn btn-success">
Add Patient
</a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Patient"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>MR No</th>
<th>Name</th>
<th>Phone</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($patients as $patient)

<tr>

<td>{{ $patient->mr_no }}</td>

<td>
{{ $patient->first_name }}
{{ $patient->last_name }}
</td>

<td>{{ $patient->phone }}</td>

<td>{{ $patient->status }}</td>

<td>

<a href="{{ route('patients.show',$patient->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('patients.edit',$patient->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form
action="{{ route('patients.destroy',$patient->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<!-- <button class="btn btn-danger btn-sm">
Delete
</button> -->
<button
onclick="return confirm('Delete this patient?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $patients->links() }}

@endsection
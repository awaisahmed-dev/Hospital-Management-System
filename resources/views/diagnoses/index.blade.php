@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Diagnoses</h2>

<a href="{{ route('diagnoses.create') }}"
class="btn btn-success">
Add Diagnosis
</a>

</div>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Disease</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($diagnoses as $diagnosis)

<tr>

<td>{{ $diagnosis->id }}</td>
<td>{{ $diagnosis->patient_id }}</td>
<td>{{ $diagnosis->doctor_id }}</td>
<td>{{ $diagnosis->disease_name }}</td>
<td>{{ $diagnosis->diagnosis_date }}</td>
<td>{{ $diagnosis->status }}</td>

<td>

<a href="{{ route('diagnoses.show',$diagnosis->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('diagnoses.edit',$diagnosis->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('diagnoses.destroy',$diagnosis->id) }}"
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

{{ $diagnoses->links() }}

@endsection
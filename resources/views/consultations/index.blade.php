@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Consultations</h2>

<a href="{{ route('consultations.create') }}"
class="btn btn-success">
Add Consultation
</a>

</div>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($consultations as $consultation)

<tr>

<td>{{ $consultation->id }}</td>

<td>{{ $consultation->patient_id }}</td>

<td>{{ $consultation->doctor_id }}</td>

<td>{{ $consultation->consultation_date }}</td>

<td>{{ $consultation->status }}</td>

<td>

<a href="{{ route('consultations.show',$consultation->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('consultations.edit',$consultation->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('consultations.destroy',$consultation->id) }}"
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

{{ $consultations->links() }}

@endsection
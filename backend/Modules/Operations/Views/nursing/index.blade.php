@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Nursing Management</h2>

<a href="{{ route('nursing.create') }}"
class="btn btn-success">

Add Nursing

</a>

</div>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Nursing No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Nurse</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($nursings as $nursing)

<tr>

<td>{{ $nursing->id }}</td>

<td>{{ $nursing->nursing_no }}</td>

<td>
{{ $nursing->patient->first_name ?? '' }}
{{ $nursing->patient->last_name ?? '' }}
</td>

<td>
{{ $nursing->doctor->first_name ?? '' }}
{{ $nursing->doctor->last_name ?? '' }}
</td>

<td>
{{ $nursing->staff->first_name ?? '' }}
{{ $nursing->staff->last_name ?? '' }}
</td>

<td>{{ $nursing->nursing_date }}</td>

<td>{{ $nursing->status }}</td>

<td>

<a href="{{ route('nursing.show',$nursing->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('nursing.edit',$nursing->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('nursing.destroy',$nursing->id) }}"
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

{{ $nursings->links() }}

@endsection
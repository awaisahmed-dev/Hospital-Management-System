@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Ward Management</h2>

<a href="{{ route('wardmanagement.create') }}"
class="btn btn-success">

Add Ward

</a>

</div>

<table class="table table-bordered mt-3">

<tr>
<th>No</th>
<th>Ward No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Room</th>
<th>Bed</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($wardmanagements as $ward)

<tr>

<td>{{ $ward->id }}</td>

<td>{{ $ward->ward_no }}</td>

<td>
{{ $ward->patient->first_name ?? '' }}
{{ $ward->patient->last_name ?? '' }}
</td>

<td>
{{ $ward->doctor->first_name ?? '' }}
{{ $ward->doctor->last_name ?? '' }}
</td>

<td>{{ $ward->room->room_no ?? '' }}</td>

<td>{{ $ward->bed->bed_no ?? '' }}</td>

<td>{{ $ward->status }}</td>

<td>

<a href="{{ route('wardmanagement.show',$ward->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('wardmanagement.edit',$ward->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('wardmanagement.destroy',$ward->id) }}"
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

@endsection
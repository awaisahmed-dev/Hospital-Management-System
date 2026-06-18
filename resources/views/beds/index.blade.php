@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Beds</h2>

<a href="{{ route('beds.create') }}"
class="btn btn-success">
Add Bed
</a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Bed"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>Room ID</th>
<th>Bed No</th>
<th>Type</th>
<th>Charges</th>
<th>Availability</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($beds as $bed)

<tr>

<td>{{ $bed->room_id }}</td>
<td>{{ $bed->bed_no }}</td>
<td>{{ $bed->bed_type }}</td>
<td>{{ $bed->daily_charges }}</td>
<td>{{ $bed->availability }}</td>
<td>{{ $bed->status }}</td>

<td>

<a href="{{ route('beds.show',$bed->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('beds.edit',$bed->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form
action="{{ route('beds.destroy',$bed->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete Bed?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $beds->links() }}

@endsection
@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Rooms</h2>

<a href="{{ route('rooms.create') }}"
class="btn btn-success">
Add Room </a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Room"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>Room No</th>
<th>Room Name</th>
<th>Room Type</th>
<th>Floor</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($rooms as $room)

<tr>

<td>{{ $room->room_no }}</td>
<td>{{ $room->room_name }}</td>
<td>{{ $room->room_type }}</td>
<td>{{ $room->floor_no }}</td>
<td>{{ $room->status }}</td>

<td>

<a href="{{ route('rooms.show',$room->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('rooms.edit',$room->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form
action="{{ route('rooms.destroy',$room->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete this room?')"
class="btn btn-danger btn-sm">
Delete </button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $rooms->links() }}

@endsection

@extends('layouts.backend')

@section('content')

<h2>Edit Room</h2>

<form method="POST"
action="{{ route('rooms.update',$room->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Branch ID</label>
<input type="number" name="branch_id"
class="form-control"
value="{{ $room->branch_id }}">
</div>

<div class="col-md-4">
<label>Room No</label>
<input type="text" name="room_no"
class="form-control"
value="{{ $room->room_no }}">
</div>

<div class="col-md-4">
<label>Room Name</label>
<input type="text" name="room_name"
class="form-control"
value="{{ $room->room_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Room Type</label>
<input type="text" name="room_type"
class="form-control"
value="{{ $room->room_type }}">
</div>

<div class="col-md-4 mt-3">
<label>Floor No</label>
<input type="number" name="floor_no"
class="form-control"
value="{{ $room->floor_no }}">
</div>

<div class="col-md-4 mt-3">
<label>Capacity</label>
<input type="number" name="capacity"
class="form-control"
value="{{ $room->capacity }}">
</div>

<div class="col-md-4 mt-3">
<label>Room Charges</label>
<input type="number" step="0.01"
name="room_charges"
class="form-control"
value="{{ $room->room_charges }}">
</div>

<div class="col-md-12 mt-3">
<label>Description</label>
<textarea name="description"
class="form-control">{{ $room->description }}</textarea>
</div>

<div class="col-md-4 mt-3">

<label>Status</label>

<select name="status" class="form-control">

<option value="active"
{{ $room->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $room->status=='inactive'?'selected':'' }}>
Inactive
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Room
</button>

<a href="{{ route('rooms.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection

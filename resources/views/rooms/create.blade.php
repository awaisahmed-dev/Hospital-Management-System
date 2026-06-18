@extends('layouts.backend')

@section('content')

<h2>Create Room</h2>

<form method="POST" action="{{ route('rooms.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Branch ID</label>
<input type="number" name="branch_id" class="form-control">
</div>

<div class="col-md-4">
<label>Room No</label>
<input type="text" name="room_no" class="form-control">
</div>

<div class="col-md-4">
<label>Room Name</label>
<input type="text" name="room_name" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Room Type</label>
<input type="text" name="room_type" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Floor No</label>
<input type="number" name="floor_no" class="form-control" value="1">
</div>

<div class="col-md-4 mt-3">
<label>Capacity</label>
<input type="number" name="capacity" class="form-control" value="1">
</div>

<div class="col-md-4 mt-3">
<label>Room Charges</label>
<input type="number" step="0.01" name="room_charges" class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">

<label>Status</label>

<select name="status" class="form-control">
<option value="active">Active</option>
<option value="inactive">Inactive</option>
</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Room
</button>

<a href="{{ route('rooms.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection

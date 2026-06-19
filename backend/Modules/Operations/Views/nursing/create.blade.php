@extends('layouts.backend')

@section('content')

<h2>Create Nursing Record</h2>

<form method="POST"
action="{{ route('nursing.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Nursing No</label>
<input type="text"
name="nursing_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id"
class="form-control">

@foreach($doctors as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Nurse</label>
<select name="staff_id"
class="form-control">

@foreach($staffs as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Date</label>
<input type="date"
name="nursing_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Care Notes</label>
<textarea name="care_notes"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Medication Notes</label>
<textarea name="medication_notes"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="active">
Active
</option>

<option value="completed">
Completed
</option>

<option value="cancelled">
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save
</button>

</form>

@endsection
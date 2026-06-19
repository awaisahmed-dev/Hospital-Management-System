@extends('layouts.backend')

@section('content')

<h2>Edit Nursing Record</h2>

<form method="POST"
action="{{ route('nursing.update',$nursing->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Nursing No</label>
<input type="text"
name="nursing_no"
class="form-control"
value="{{ $nursing->nursing_no }}">
</div>

<div class="col-md-4">
<label>Patient</label>

<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}"
{{ $nursing->patient_id==$id ? 'selected' : '' }}>
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

<option value="{{ $id }}"
{{ $nursing->doctor_id==$id ? 'selected' : '' }}>
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

<option value="{{ $id }}"
{{ $nursing->staff_id==$id ? 'selected' : '' }}>
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4 mt-3">
<label>Date</label>
<input type="date"
name="nursing_date"
class="form-control"
value="{{ $nursing->nursing_date }}">
</div>

<div class="col-md-12 mt-3">
<label>Care Notes</label>

<textarea name="care_notes"
class="form-control">{{ $nursing->care_notes }}</textarea>

</div>

<div class="col-md-12 mt-3">
<label>Medication Notes</label>

<textarea name="medication_notes"
class="form-control">{{ $nursing->medication_notes }}</textarea>

</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $nursing->status=='active' ? 'selected' : '' }}>
Active
</option>

<option value="completed"
{{ $nursing->status=='completed' ? 'selected' : '' }}>
Completed
</option>

<option value="cancelled"
{{ $nursing->status=='cancelled' ? 'selected' : '' }}>
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update
</button>

</form>

@endsection
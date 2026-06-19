@extends('layouts.backend')

@section('content')

<h2>Edit Prescription</h2>

<form method="POST"
action="{{ route('prescriptions.update',$prescription->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Prescription No</label>
<input type="text"
name="prescription_no"
value="{{ $prescription->prescription_no }}"
class="form-control">
</div>

<div class="col-md-4">
<label>Consultation</label>
<select name="consultation_id" class="form-control">
@foreach($consultations as $id=>$name)
<option value="{{ $id }}"
{{ $prescription->consultation_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Diagnosis</label>
<select name="diagnosis_id" class="form-control">
<option value="">Select</option>
@foreach($diagnoses as $id=>$name)
<option value="{{ $id }}"
{{ $prescription->diagnosis_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Patient</label>
<select name="patient_id" class="form-control">
@foreach($patients as $id=>$name)
<option value="{{ $id }}"
{{ $prescription->patient_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Doctor</label>
<select name="doctor_id" class="form-control">
@foreach($doctors as $id=>$name)
<option value="{{ $id }}"
{{ $prescription->doctor_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Prescription Date</label>
<input type="date"
name="prescription_date"
value="{{ $prescription->prescription_date }}"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Medicine Details</label>
<textarea
name="medicine_details"
class="form-control"
rows="5">{{ $prescription->medicine_details }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Instructions</label>
<textarea
name="instructions"
class="form-control"
rows="4">{{ $prescription->instructions }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Duration (Days)</label>
<input type="number"
name="duration_days"
value="{{ $prescription->duration_days }}"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">

<option value="active"
{{ $prescription->status=='active'?'selected':'' }}>
Active
</option>

<option value="completed"
{{ $prescription->status=='completed'?'selected':'' }}>
Completed
</option>

<option value="cancelled"
{{ $prescription->status=='cancelled'?'selected':'' }}>
Cancelled
</option>

</select>
</div>

</div>

<br>

<button class="btn btn-success">
Update Prescription
</button>

<a href="{{ route('prescriptions.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection
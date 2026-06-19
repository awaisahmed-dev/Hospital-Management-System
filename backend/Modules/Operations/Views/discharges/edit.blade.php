@extends('layouts.backend')

@section('content')

<h2>Edit Discharge</h2>

<form method="POST"
action="{{ route('discharges.update',$discharge->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Discharge No</label>
<input type="text"
name="discharge_no"
class="form-control"
value="{{ $discharge->discharge_no }}">
</div>

<div class="col-md-4">
<label>Admission</label>
<select name="admission_id"
class="form-control">

@foreach($admissions as $id=>$name)

<option value="{{ $id }}"
{{ $discharge->admission_id==$id ? 'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}"
{{ $discharge->patient_id==$id ? 'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Doctor</label>
<select name="doctor_id"
class="form-control">

@foreach($doctors as $id=>$name)

<option value="{{ $id }}"
{{ $discharge->doctor_id==$id ? 'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Discharge Date</label>
<input type="date"
name="discharge_date"
class="form-control"
value="{{ $discharge->discharge_date }}">
</div>

<div class="col-md-12 mt-3">
<label>Discharge Summary</label>
<textarea name="discharge_summary"
class="form-control">{{ $discharge->discharge_summary }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Final Diagnosis</label>
<textarea name="final_diagnosis"
class="form-control">{{ $discharge->final_diagnosis }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Instructions</label>
<textarea name="instructions"
class="form-control">{{ $discharge->instructions }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="pending"
{{ $discharge->status=='pending' ? 'selected':'' }}>
Pending
</option>

<option value="completed"
{{ $discharge->status=='completed' ? 'selected':'' }}>
Completed
</option>

<option value="cancelled"
{{ $discharge->status=='cancelled' ? 'selected':'' }}>
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Discharge
</button>

<a href="{{ route('discharges.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection

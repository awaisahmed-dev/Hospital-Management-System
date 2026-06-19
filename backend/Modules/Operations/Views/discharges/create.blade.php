@extends('layouts.backend')

@section('content')

<h2>Create Discharge</h2>

<form method="POST"
action="{{ route('discharges.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Discharge No</label>
<input type="text"
name="discharge_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Admission</label>
<select name="admission_id"
class="form-control">

@foreach($admissions as $id=>$name)

<option value="{{ $id }}">
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

<option value="{{ $id }}">
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

<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Discharge Date</label>
<input type="date"
name="discharge_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Discharge Summary</label>
<textarea name="discharge_summary"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Final Diagnosis</label>
<textarea name="final_diagnosis"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Instructions</label>
<textarea name="instructions"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="pending">
Pending
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
Save Discharge
</button>

<a href="{{ route('discharges.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection

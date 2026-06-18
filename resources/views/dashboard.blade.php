@extends('layouts.backend')

@section('content')

<h2>Hospital ERP Dashboard</h2>

<div class="row mt-4">

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h4>Patients</h4>

<h2>{{ $patients }}</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h4>Doctors</h4>

<h2>{{ $doctors }}</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h4>Departments</h4>

<h2>{{ $departments }}</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h4>Staff</h4>

<h2>{{ $staff }}</h2>

</div>

</div>

</div>

</div>

<hr>

<h3 class="mt-5">

Recent Activities

</h3>

<table class="table">

<tr>

<th>Date</th>
<th>Event</th>

</tr>

<tr>
<td>Today</td>
<td>Patient Registered</td>
</tr>

<tr>
<td>Today</td>
<td>Doctor Added</td>
</tr>

</table>

@endsection
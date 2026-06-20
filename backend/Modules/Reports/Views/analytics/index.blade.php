@extends('layouts.backend')

@section('content')

<h2>Analytics Dashboard</h2>

<div class="row">

<div class="col-md-6">

<div class="card">

<div class="card-body">

<h4>Total Patients</h4>

<h2>{{ $patients }}</h2>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card">

<div class="card-body">

<h4>Total Doctors</h4>

<h2>{{ $doctors }}</h2>

</div>

</div>

</div>

</div>

@endsection
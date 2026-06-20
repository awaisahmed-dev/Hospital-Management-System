@extends('layouts.backend')

@section('content')

<h2>Edit Employee</h2>

<form method="POST"
action="{{ route('employees.update',$employee->id) }}">

@csrf
@method('PUT')

@include('employees.form')

<button class="btn btn-success">
Update Employee
</button>

</form>

@endsection
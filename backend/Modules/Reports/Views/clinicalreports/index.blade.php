@extends('layouts.backend')

@section('content')

<h2>Clinical Reports</h2>

<table class="table table-bordered">

<tr>
    <th>Total Patients</th>
    <td>{{ $totalPatients }}</td>
</tr>

<tr>
    <th>Total Doctors</th>
    <td>{{ $totalDoctors }}</td>
</tr>

<tr>
    <th>Total Admissions</th>
    <td>{{ $totalAdmissions }}</td>
</tr>

<tr>
    <th>Total Discharges</th>
    <td>{{ $totalDischarges }}</td>
</tr>

<tr>
    <th>Total Ward Management</th>
    <td>{{ $totalWardManagement }}</td>
</tr>

<tr>
    <th>Total Scheduling</th>
    <td>{{ $totalScheduling }}</td>
</tr>

</table>

@endsection
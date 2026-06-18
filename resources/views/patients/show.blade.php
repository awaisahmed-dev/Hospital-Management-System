@extends('layouts.backend')

@section('content')

<h2>Patient Details</h2>

<table class="table table-bordered">

<tr>
<th>MR No</th>
<td>{{ $patient->mr_no }}</td>
</tr>

<tr>
<th>First Name</th>
<td>{{ $patient->first_name }}</td>
</tr>

<tr>
<th>Middle Name</th>
<td>{{ $patient->middle_name }}</td>
</tr>

<tr>
<th>Last Name</th>
<td>{{ $patient->last_name }}</td>
</tr>

<tr>
<th>Gender</th>
<td>{{ $patient->gender }}</td>
</tr>

<tr>
<th>DOB</th>
<td>{{ $patient->dob }}</td>
</tr>

<tr>
<th>CNIC</th>
<td>{{ $patient->cnic }}</td>
</tr>

<tr>
<th>Passport</th>
<td>{{ $patient->passport_no }}</td>
</tr>

<tr>
<th>Phone</th>
<td>{{ $patient->phone }}</td>
</tr>

<tr>
<th>Alternate Phone</th>
<td>{{ $patient->alternate_phone }}</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $patient->email }}</td>
</tr>

<tr>
<th>Blood Group</th>
<td>{{ $patient->blood_group }}</td>
</tr>

<tr>
<th>Marital Status</th>
<td>{{ $patient->marital_status }}</td>
</tr>

<tr>
<th>Address</th>
<td>{{ $patient->address }}</td>
</tr>

<tr>
<th>City</th>
<td>{{ $patient->city }}</td>
</tr>

<tr>
<th>Province</th>
<td>{{ $patient->province }}</td>
</tr>

<tr>
<th>Country</th>
<td>{{ $patient->country }}</td>
</tr>

<tr>
<th>Guardian Name</th>
<td>{{ $patient->guardian_name }}</td>
</tr>

<tr>
<th>Guardian Phone</th>
<td>{{ $patient->guardian_phone }}</td>
</tr>

<tr>
<th>Emergency Contact</th>
<td>{{ $patient->emergency_contact }}</td>
</tr>

<tr>
<th>Occupation</th>
<td>{{ $patient->occupation }}</td>
</tr>

<tr>
<th>Insurance Company</th>
<td>{{ $patient->insurance_company }}</td>
</tr>

<tr>
<th>Insurance Number</th>
<td>{{ $patient->insurance_number }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $patient->status }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $patient->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $patient->updated_at }}</td>
</tr>

</table>

<a href="{{ route('patients.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
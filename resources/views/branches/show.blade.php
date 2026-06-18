@extends('layouts.backend')

@section('content')

<h2>Branch Profile</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $branch->id }}</td>
</tr>

<tr>
<th>Branch Code</th>
<td>{{ $branch->branch_code }}</td>
</tr>

<tr>
<th>Name</th>
<td>{{ $branch->name }}</td>
</tr>

<tr>
<th>Phone</th>
<td>{{ $branch->phone }}</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $branch->email }}</td>
</tr>

<tr>
<th>Address</th>
<td>{{ $branch->address }}</td>
</tr>

<tr>
<th>City</th>
<td>{{ $branch->city }}</td>
</tr>

<tr>
<th>Country</th>
<td>{{ $branch->country }}</td>
</tr>

<tr>
<th>Total Rooms</th>
<td>{{ $branch->total_rooms }}</td>
</tr>

<tr>
<th>Total Beds</th>
<td>{{ $branch->total_beds }}</td>
</tr>

<tr>
<th>Manager Name</th>
<td>{{ $branch->manager_name }}</td>
</tr>

<tr>
<th>Manager Phone</th>
<td>{{ $branch->manager_phone }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $branch->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $branch->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $branch->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $branch->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $branch->updated_at }}</td>
</tr>

</table>

<a href="{{ route('branches.index') }}"
class="btn btn-secondary">
Back </a>

@endsection

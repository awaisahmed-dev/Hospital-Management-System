@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Billing</h2>

<a href="{{ route('billings.create') }}"
class="btn btn-success">
Add Billing
</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
placeholder="Search Billing"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>No</th>
<th>Billing No</th>
<th>Invoice</th>
<th>Patient</th>
<th>Total Amount</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($billings as $billing)

<tr>

<td>{{ $billing->id }}</td>

<td>{{ $billing->billing_no }}</td>

<td>{{ $billing->invoice->invoice_no ?? '' }}</td>

<td>
{{ $billing->patient->first_name ?? '' }}
{{ $billing->patient->last_name ?? '' }}
</td>

<td>{{ $billing->total_amount }}</td>

<td>{{ $billing->status }}</td>

<td>

<a href="{{ route('billings.show',$billing->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('billings.edit',$billing->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('billings.destroy',$billing->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $billings->links() }}

@endsection
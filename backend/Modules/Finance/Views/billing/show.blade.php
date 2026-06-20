@extends('layouts.backend')

@section('content')

<h2>Billing Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $billing->id }}</td>
</tr>

<tr>
<th>Billing No</th>
<td>{{ $billing->billing_no }}</td>
</tr>

<tr>
<th>Invoice</th>
<td>{{ $billing->invoice->invoice_no ?? '' }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $billing->patient->first_name ?? '' }}
{{ $billing->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Billing Date</th>
<td>{{ $billing->billing_date }}</td>
</tr>

<tr>
<th>Subtotal</th>
<td>{{ $billing->subtotal }}</td>
</tr>

<tr>
<th>Discount</th>
<td>{{ $billing->discount }}</td>
</tr>

<tr>
<th>Tax</th>
<td>{{ $billing->tax }}</td>
</tr>

<tr>
<th>Total Amount</th>
<td>{{ $billing->total_amount }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $billing->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $billing->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $billing->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $billing->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $billing->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $billing->updated_at }}</td>
</tr>

</table>

<a href="{{ route('billings.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
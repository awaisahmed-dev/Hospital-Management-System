@extends('layouts.backend')

@section('content')

<h2>Payment Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $payment->id }}</td>
</tr>

<tr>
<th>Payment No</th>
<td>{{ $payment->payment_no }}</td>
</tr>

<tr>
<th>Invoice</th>
<td>{{ $payment->invoice->invoice_no ?? '' }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $payment->patient->first_name ?? '' }}
{{ $payment->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Amount</th>
<td>{{ $payment->amount }}</td>
</tr>

<tr>
<th>Payment Date</th>
<td>{{ $payment->payment_date }}</td>
</tr>

<tr>
<th>Payment Method</th>
<td>{{ $payment->payment_method }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $payment->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $payment->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $payment->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $payment->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $payment->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $payment->updated_at }}</td>
</tr>

</table>

<a href="{{ route('payments.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
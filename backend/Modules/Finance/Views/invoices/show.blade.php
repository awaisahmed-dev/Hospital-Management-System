@extends('layouts.backend')

@section('content')

<h2>Invoice Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $invoice->id }}</td>
</tr>

<tr>
<th>Invoice No</th>
<td>{{ $invoice->invoice_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $invoice->patient->first_name ?? '' }}
{{ $invoice->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Doctor</th>
<td>
{{ $invoice->doctor->first_name ?? '' }}
{{ $invoice->doctor->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Total Amount</th>
<td>{{ $invoice->total_amount }}</td>
</tr>

<tr>
<th>Paid Amount</th>
<td>{{ $invoice->paid_amount }}</td>
</tr>

<tr>
<th>Balance Amount</th>
<td>{{ $invoice->balance_amount }}</td>
</tr>

<tr>
<th>Invoice Date</th>
<td>{{ $invoice->invoice_date }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $invoice->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $invoice->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $invoice->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $invoice->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $invoice->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $invoice->updated_at }}</td>
</tr>

</table>

<a href="{{ route('invoices.index') }}"
class="btn btn-secondary">

Back

</a>

@endsection
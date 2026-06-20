@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Invoices</h2>

<a href="{{ route('invoices.create') }}"
class="btn btn-success">

Add Invoice

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
placeholder="Search Invoice"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Invoice No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Total</th>
<th>Paid</th>
<th>Balance</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($invoices as $invoice)

<tr>

<td>{{ $invoice->id }}</td>

<td>{{ $invoice->invoice_no }}</td>

<td>
{{ $invoice->patient->first_name ?? '' }}
{{ $invoice->patient->last_name ?? '' }}
</td>

<td>
{{ $invoice->doctor->first_name ?? '' }}
{{ $invoice->doctor->last_name ?? '' }}
</td>

<td>{{ $invoice->total_amount }}</td>

<td>{{ $invoice->paid_amount }}</td>

<td>{{ $invoice->balance_amount }}</td>

<td>{{ $invoice->status }}</td>

<td>

<a href="{{ route('invoices.show',$invoice->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('invoices.edit',$invoice->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('invoices.destroy',$invoice->id) }}"
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

{{ $invoices->links() }}

@endsection
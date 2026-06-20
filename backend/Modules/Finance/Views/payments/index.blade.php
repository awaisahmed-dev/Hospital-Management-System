@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Payments</h2>

<a href="{{ route('payments.create') }}"
class="btn btn-success">

Add Payment

</a>

</div>

<form method="GET"
class="mt-3">

<input type="text"
name="search"
placeholder="Search Payment"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Payment No</th>
<th>Invoice</th>
<th>Patient</th>
<th>Amount</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($payments as $payment)

<tr>

<td>{{ $payment->id }}</td>

<td>{{ $payment->payment_no }}</td>

<td>
{{ $payment->invoice->invoice_no ?? '' }}
</td>

<td>
{{ $payment->patient->first_name ?? '' }}
{{ $payment->patient->last_name ?? '' }}
</td>

<td>{{ $payment->amount }}</td>

<td>{{ $payment->payment_date }}</td>

<td>{{ $payment->status }}</td>

<td>

<a href="{{ route('payments.show',$payment->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('payments.edit',$payment->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('payments.destroy',$payment->id) }}"
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

{{ $payments->links() }}

@endsection
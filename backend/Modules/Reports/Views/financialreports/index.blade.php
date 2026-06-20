@extends('layouts.backend')

@section('content')

<h2>Financial Reports</h2>

<table class="table table-bordered">

<tr>
<th>Total Invoices</th>
<td>{{ $totalInvoices }}</td>
</tr>

<tr>
<th>Total Payments</th>
<td>{{ $totalPayments }}</td>
</tr>

<tr>
<th>Total Billings</th>
<td>{{ $totalBillings }}</td>
</tr>

<tr>
<th>Total Expenses</th>
<td>{{ $totalExpenses }}</td>
</tr>

<tr>
<th>Total Payrolls</th>
<td>{{ $totalPayrolls }}</td>
</tr>

<tr>
<th>Total Revenue</th>
<td>{{ number_format($revenue,2) }}</td>
</tr>

<tr>
<th>Total Expense</th>
<td>{{ number_format($expense,2) }}</td>
</tr>

<tr>
<th>Net Profit</th>
<td>{{ number_format($profit,2) }}</td>
</tr>

</table>

@endsection
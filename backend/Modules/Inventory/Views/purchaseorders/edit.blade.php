@extends('layouts.backend')

@section('content')

<h2>Edit Purchase Order</h2>

<form method="POST"
action="{{ route('purchaseorders.update',$purchaseorder->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>PO No</label>
<input type="text"
name="po_no"
class="form-control"
value="{{ $purchaseorder->po_no }}">
</div>

<div class="col-md-4">

<select name="supplier_id"
class="form-control">

@foreach($suppliers as $id=>$name)

<option value="{{ $id }}"
{{ $purchaseorder->supplier_id==$id ? 'selected':'' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<input type="date"
name="po_date"
class="form-control"
value="{{ $purchaseorder->po_date }}">
</div>

<div class="col-md-4 mt-3">
<input type="number"
step="0.01"
name="total_amount"
class="form-control"
value="{{ $purchaseorder->total_amount }}">
</div>

</div>

<br>

<button class="btn btn-success">
Update Purchase Order
</button>

</form>

@endsection
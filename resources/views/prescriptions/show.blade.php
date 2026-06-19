@extends('layouts.backend')

@section('content')

<h2>Prescription Profile</h2>

<table class="table table-bordered">

@foreach($prescription->toArray() as $key=>$value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('prescriptions.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
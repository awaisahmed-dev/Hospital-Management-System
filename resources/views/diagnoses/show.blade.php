@extends('layouts.backend')

@section('content')

<h2>Diagnosis Profile</h2>

<table class="table table-bordered">

@foreach($diagnosis->toArray() as $key => $value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('diagnoses.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
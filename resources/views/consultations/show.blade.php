@extends('layouts.backend')

@section('content')

<h2>Consultation Profile</h2>

<table class="table table-bordered">

@foreach($consultation->toArray() as $key => $value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('consultations.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection
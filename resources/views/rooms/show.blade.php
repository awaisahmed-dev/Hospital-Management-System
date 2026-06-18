@extends('layouts.backend')

@section('content')

<h2>Room Profile</h2>

<table class="table table-bordered">

@foreach($room->toArray() as $key => $value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('rooms.index') }}"
class="btn btn-secondary">
Back </a>

@endsection

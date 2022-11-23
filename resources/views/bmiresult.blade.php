@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">bmi</th>
            <th scope="col">obes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data['bmi'] }}</td>
            {{-- <td>{{ $data['bmi'] }}</td> --}}
            <td>{{ $data['obes']}}</td>
        </tr>
    </tbody>
</table>

@endsection

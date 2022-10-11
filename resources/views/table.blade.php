@extends('template')

@section('main')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nis</th>
            <th scope="col">nama</th>
            <th scope="col">alamat</th>
            <th scope="col">sekolah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->nis}}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->sekolah->namasekolah }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

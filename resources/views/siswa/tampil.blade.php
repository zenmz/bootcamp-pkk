@extends('template')

@section('main')
<h1>Data Siswa</h1>

<a href="{{ url('siswa/create') }}" class="btn btn-primary">Tambah Data</a>
<a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data dgn route</a>

<table class="table mt-3">
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
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->sekolah->namasekolah }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

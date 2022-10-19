@extends('template')

@section('main')
<h1>Data Siswa</h1>

<a href="{{ url('siswa/create') }}" class="btn btn-primary">Tambah Data</a>
<a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data dgn route</a>

<div class="mt-4">
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nis</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Sekolah</th>
                <th scope="col">Action</th>
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
                <td>
                    <a href="{{ url('siswa/'.$item->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                    {{-- <a href="{{ route('siswa.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a> --}}
                    <a href="{{ url('deletesiswa/'.$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    {{-- <a href="{{ route('deletesiswa', $item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}

                    {{-- <form action="{{ route('siswa.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{-- {{ $data->links() }} --}}
</div>
@endsection

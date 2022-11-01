@extends('template')

@section('main')
<h1>Image</h1>

<a href="{{ url('upload/create') }}" class="btn btn-primary">Tambah Data</a>

<div class="mt-4">
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ asset('storage/'.$item->image) }}" alt="" width="100px"></td>
                <td>
                    <a href="{{ url('upload/'.$item->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                    <a href="{{ url('deleteupload/'.$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

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

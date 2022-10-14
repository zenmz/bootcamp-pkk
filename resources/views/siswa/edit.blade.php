@extends('template')

@section('main')
<form action="{{ url('siswa/'.$data->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>NIS</label>
        <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $data->nis }}">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $data->alamat }}">
    </div>
    <div class="form-group">
        <label>Sekolah</label>
        <select class="form-control @error('sekolah_id') is-invalid @enderror" name="sekolah_id">
            <option value="">Pilih Sekolah</option>
            @foreach ($sekolah as $item)
            <option value="{{ $item->id }}" @selected($data->sekolah_id==$item->id) >{{ $item->namasekolah }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

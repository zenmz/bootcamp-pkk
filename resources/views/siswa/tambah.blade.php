@extends('template')

@section('main')
<form action="{{ route('siswa.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>NIS</label>
        <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
    </div>
    <div class="form-group">
        <label>Sekolah</label>
        <select class="form-control @error('sekolah_id') is-invalid @enderror" name="sekolah_id">
            <option value="">Pilih Sekolah</option>
            @foreach ($data as $item)
            <option value="{{ $item->id }}" @selected(old('sekolah_id')==$item->id) >{{ $item->namasekolah }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

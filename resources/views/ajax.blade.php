@extends('template')

@section('main')
<div class="form-group">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Provinsi</label>
        <select class="form-control" id="provinces" onchange="daerah(id,value)">
            <option value="">Pilih yang paling sesuai</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Kabupaten</label>
        <select class="form-control" id="regencies" onchange="daerah(id,value)">
            <option value="">Pilih yang paling sesuai</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Kabupaten</label>
        <select class="form-control" id="districts" onchange="daerah(id,value)">
            <option value="">Pilih yang paling sesuai</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Kabupaten</label>
        <select class="form-control" id="villages" onchange="daerah(id,value)">
            <option value="">Pilih yang paling sesuai</option>
        </select>
    </div>
</div>
@endsection

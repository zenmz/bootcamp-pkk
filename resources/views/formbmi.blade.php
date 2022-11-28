@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('rumah.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tinggi Badan</label>
                    <input type="number" class="form-control" name="tinggi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Berat Badan</label>
                    <input type="number" class="form-control" name="berat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <select class="form-select" name="tahun">
                        <option selected>Pilih Tahun lahir</option>
                        @for($i = 1880; $i < date("Y"); $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hobi</label>
                    <input type="text" class="form-control" name="hobi">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr>

            @isset($data)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Biodata Diri</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data['nama']}}</td>
                    </tr>
                    <tr>
                        <th>Tinggi Badan</th>
                        <td>{{ $data['tinggi']}}</td>
                    </tr>
                    <tr>
                        <th>Berat Badan</th>
                        <td>{{ $data['berat']}}</td>
                    </tr>
                    <tr>
                        <th>BMI</th>
                        <td>{{ $data['bmi']}}</td>
                    </tr>
                    <tr>
                        <th>Status Berat Badan</th>
                        <td>{{ $data['status']}}</td>
                    </tr>
                    <tr>
                        <th>Hobi</th>
                        <td>{{ $data['hobi']}}</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>{{ $data['umur']}}</td>
                    </tr>
                    <tr>
                        <th>Konsultasi Gratis</th>
                        <td>{{ $data['konsul']}}</td>
                    </tr>
                </tbody>
            </table>
            @endisset
        </div>
    </div>
</div>

@endsection

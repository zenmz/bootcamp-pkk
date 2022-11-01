@extends('template')

@section('main')
<div>
    <form action="{{ route('upload.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <img src="{{ asset('storage/'.$data->image) }}" alt="" width="200px">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

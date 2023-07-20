@extends('layouts.main')

@section('container')
    <div class="container d-flex align-items-center justify-content-center">
        <div class="col-md-7">

            @if (session()->has('loginErorr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginErorr') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="/admin/dashboard/{{ $data->id }}" enctype="multipart/form-data"
                class="shadow border p-5">
                <div class="text-center mb-5">
                    <h1>Edit Ruangan</h1>
                </div>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name : </label>
                    <input type="text" class="form-control shadow @error('name') is-invalid @enderror"
                        value="{{ $data->name }}" name="name" id="name" placeholder="A.2.1" autocomplete="off">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Room Type : </label>
                    <input type="text" class="form-control shadow @error('room_type') is-invalid @enderror"
                        value="{{ $data->room_type }}" placeholder="Ruangan Belajar / Ruangan Komputer" name="room_type"
                        id="room_type" autocomplete="off">
                    @error('room_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Student Capacity : </label>
                    <input type="number" class="form-control shadow @error('capacity') is-invalid @enderror"
                        value="{{ $data->capacity }}" name="capacity" id="capacity" autocomplete="off">
                    @error('capacity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Location : </label>
                    <input type="text" class="form-control shadow @error('location') is-invalid @enderror"
                        value="{{ $data->location }}" name="location" id="location" placeholder="Gedung A Lantai 2"
                        autocomplete="off">
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <img src="{{ url('foto/' . $data->foto) }}" style="max-height: 100px">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto : </label>
                    <input type="file" class="form-control shadow @error('foto') is-invalid @enderror" name="foto"
                        id="foto" autocomplete="off">
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ URL::previous() }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection

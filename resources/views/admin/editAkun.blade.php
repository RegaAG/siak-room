@extends('layouts.main')

@section('container')
    <div class="container d-flex align-items-center justify-content-center">
        <div class="col-md-7">
            @if (session()->has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="/admin/dashboard/akun/{{ $data->id }}" class="shadow border p-5">
                <div class="text-center mb-5">
                    <h1>Edit Akun</h1>
                </div>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Class Leader Name : </label>
                    <input type="text" class="form-control shadow @error('name') is-invalid @enderror"
                        value="{{ $data->name }}" name="name" id="name" autocomplete="off">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Class : </label>
                    <input type="text" class="form-control shadow @error('class') is-invalid @enderror"
                        value="{{ $data->class }}" name="class" id="class" autocomplete="off">
                    @error('class')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Faculty : </label>
                    <input type="text" class="form-control shadow @error('faculty') is-invalid @enderror"
                        value="{{ $data->faculty }}" name="faculty" id="faculty" autocomplete="off">
                    @error('faculty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Program : </label>
                    <input type="text" class="form-control shadow @error('program') is-invalid @enderror"
                        value="{{ $data->program }}" name="program" id="program" autocomplete="off">
                    @error('program')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Semester : </label>
                    <input type="number" class="form-control shadow @error('semester') is-invalid @enderror"
                        value="{{ $data->semester }}" name="semester" id="semester" autocomplete="off">
                    @error('semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Username : </label>
                    <input type="text" class="form-control shadow @error('username') is-invalid @enderror"
                        value="{{ $data->username }}" name="username" id="username" autocomplete="off">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password : </label>
                    <input type="password" class="form-control shadow" name="password" id="password" autocomplete="off">
                </div>
                <label class="form-label">Apakah ini Admin : </label>
                <select class="form-select form-select-sm mb-3" name="is_admin" id="is_admin"
                    aria-label=".form-select-sm example">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                    @error('is_admin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </select>
                <div class="button ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

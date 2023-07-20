@extends('layouts.main')

@section('container')
    <div class="container d-flex align-items-center justify-content-center">
        <div class="col-md-7">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="/bookings" enctype="multipart/form-data" class="shadow border p-5">
                <div class="text-center mb-5">
                    <h1>Isi Formulir</h1>
                </div>
                @csrf
                <div class="mb-3">
                    <label class="form-label">User ID : </label>
                    <input type="text" class="form-control shadow " value="{{ $user->id }}" name="user_id"
                        id="user_id" readonly autocomplete="off">
                </div>
                <div class="mb-3">
                    <label class="form-label">Room ID : </label>
                    <input type="text" class="form-control shadow " value="{{ $room->id }}" name="room_id"
                        id="room_id" readonly autocomplete="off">
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date : </label>
                    <input type="datetime-local" class="form-control shadow" name="start_date" id="start_date"
                        autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date : </label>
                    <input type="datetime-local" class="form-control shadow" name="end_date" id="end_date"
                        autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description : </label>
                    <input type="text" class="form-control shadow" name="description" id="description"
                        placeholder="Mata Kuliah Database / Kumpulan Organisai Informatika" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control shadow" value="proses" name="status" id="status">
                </div>
                <div class="button ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="judul text-center pt-5 pb-5">
            <h1>DAFTAR RUANGAN</h1>
        </div>

        <div class="row">
            @foreach ($datas as $data)
                <div class="col-sm-3 mt-3">
                    <div class="card card-vertical mx-auto shadow border rounded-5">
                        <img src="{{ url('foto' . '/' . $data->foto) }}" class="card-img-top w-100" />
                        <div class="card-body text-center">
                            <h5 class="card-title p-2">{{ $data->name }}</h5>
                            <h6 class="card-subtitle mt-2">Room Type : {{ $data->room_type }}</h6>
                            <h6 class="card-subtitle mt-2">Capacity : {{ $data->capacity }}</h6>
                            <h6 class="card-subtitle mt-2">Location : {{ $data->location }}</h6>
                            <!-- Button trigger modal -->
                            @if (Auth::check())
                                <a href="/bookings/{{ $data->id }}" class="btn btn-success mt-3"> Booking Now </a>
                            @else
                                <a href="/sesi" class="btn btn-warning mt-3"> Login For Booking </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

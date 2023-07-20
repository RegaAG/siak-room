@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="judul text-center pt-5 pb-5">
            @if (session()->has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1>Halaman Status</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Class, Faculty, Program</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Name Ruangan</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->user->class }}, {{ $booking->user->faculty }}, {{ $booking->user->program }}
                            </td>
                            <td>{{ $booking->user->semester }}</td>
                            <td>{{ $booking->ruangan->name }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

@extends('layouts.main')

@section('container')
    <div class="judul text-center pt-5 pb-5">
        <h1>Halaman Booking</h1>
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

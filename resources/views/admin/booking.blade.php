@extends('admin.layouts.main')

@section('postingan')
    <div class="postingan my-3">

        @if (session()->has('info'))
            <div class="alert alert-info alert-dismissible fade show my-3" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-bordered">
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
                    <th scope="col">Aksi</th>
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
                        <td>
                            <form action="{{ route('bookings.approve', $booking->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success m-2">Disetujui</button>
                            </form>
                            <form action="{{ route('bookings.reject', $booking->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger m-2">Ditolak</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

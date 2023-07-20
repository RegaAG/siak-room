@extends('admin.layouts.main')

@section('postingan')
    <div class="postingan my-3">
        <a href="/admin/dashboard/create" class="btn btn-primary my-2"> Tambah Ruangan </a>
        @if (session()->has('info'))
            <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Student Capacity</th>
                    <th scope="col">Location</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($datas as $data)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td><img src="{{ url('foto' . '/' . $data->foto) }}" style="max-width: 100px"></td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->room_type }}</td>
                        <td>{{ $data->capacity }}</td>
                        <td>{{ $data->location }}</td>
                        <td class=" p-3 d-flex justify-content-center">
                            <a class="btn btn-warning mx-2" href="dashboard/{{ $data->id }}/edit">Edit</a>
                            <form action="/admin/dashboard/{{ $data->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

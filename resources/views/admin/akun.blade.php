@extends('admin.layouts.main')

@section('postingan')
    <div class="postingan my-3">
        <a href="/admin/dashboard/akun/create" class="btn btn-primary my-2"> Tambah Akun </a>
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
                    <th scope="col">Class Leader Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Program</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Username</th>
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
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->class }}</td>
                        <td>{{ $data->faculty }}</td>
                        <td>{{ $data->program }}</td>
                        <td>{{ $data->semester }}</td>
                        <td>{{ $data->username }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-warning mx-2" href="/admin/dashboard/akun/{{ $data->id }}/edit">Edit</a>
                            <form action="/admin/dashboard/akun/{{ $data->id }}" method="POST">
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

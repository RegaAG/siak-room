@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="d-flex align-items-center py-4 bg-body-tertiary">
                <main class="form-signin w-100 m-auto">
                    <form method="POST" action="/sesi/login">
                        @csrf
                        @if (session()->has('loginErorr'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginErorr') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                placeholder="username" value="{{ old('username') }}" name="username" id="username"
                                autocomplete="off">
                            <label for="floatingInput">Username</label>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control my-2" name="password" id="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

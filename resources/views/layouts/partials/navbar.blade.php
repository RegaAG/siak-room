<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
    <div class="container-xl">
        <a class="navbar-brand" href="/">Universitas Primagraha</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL"
            aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('daftar-ruangan') ? 'active' : '' }}"
                        href="/daftar-ruangan">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('booking') ? 'active' : '' }}" href="/booking">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('status') ? 'active' : '' }}" href="/status">My Bokking</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            @can('admin')
                                <li>
                                    <a class="dropdown-item" href="/admin">Dashboard</a>
                                </li>
                            @endcan
                            <li>
                                <a class="dropdown-item" href="#">Setting</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="/logout">Logout <i
                                        class="bi bi-box-arrow-in-left"></i></a>
                            </li>
                        </ul>
                    </li>
                @else
            </ul>
            <div class="nav-item ms-auto">
                <a href="/sesi" class="btn btn-outline-success" type="submit">
                    LOGIN
                    <i class="bi bi-box-arrow-in-right"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
</nav>

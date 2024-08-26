<div class="bg-light bg-gradient border-end" id="sidebar-wrapper">
    <div class="fw-semibold text-center px-2 py-3"><img class="rounded-circle"
            src="assets/img/car-rental-illustration-logo-design-vector.jpg" width="70" height="70">
        <h6 class="fw-semibold mt-2">Rental Mobil</h6>
    </div>
    <ul class="nav text-light navbar-nav">
        {{-- Menu Admin & Owner --}}
        @if (Auth::check() && (Auth::user()->role == 'owner' || Auth::user()->role == 'admin'))
            <li class="nav-item py-2 px-2"><a
                    class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-layout-dashboard me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4h6v8h-6z"></path>
                        <path d="M4 16h6v4h-6z"></path>
                        <path d="M14 12h6v8h-6z"></path>
                        <path d="M14 4h6v4h-6z"></path>
                    </svg><span>Dashboard</span></a></li>
            <li class="nav-item py-2 px-2"><a class="nav-link {{ request()->routeIs('cars.index') ? 'active' : '' }}"
                    href="{{ route('cars.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-car me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5"></path>
                    </svg><span>Data Mobil</span></a></li>
        @endif
        @if (Auth::check() && (Auth::user()->role == 'owner' || Auth::user()->role == 'admin'))
            <li class="nav-item py-2 px-2"><a
                    class="nav-link {{ request()->routeIs('transaksi.index') ? 'active' : '' }}"
                    href="{{ route('transaksi.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-credit-card me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
                        <path d="M3 10l18 0"></path>
                        <path d="M7 15l.01 0"></path>
                        <path d="M11 15l2 0"></path>
                    </svg><span>Transaksi</span></a></li>
        @endif
        @if (Auth::check() && Auth::user()->role == 'owner')
            <li class="nav-item py-2 px-2"><a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                    href="{{ route('user.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-user-square-rounded me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z"></path>
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                        <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05"></path>
                    </svg><span>Data User</span></a></li>
            <li class="nav-item py-2 px-2"><a class="nav-link {{ request()->routeIs('laporan.index') ? 'active' : '' }}"
                    href="{{ route('laporan.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-file-text me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M9 9l1 0"></path>
                        <path d="M9 13l6 0"></path>
                        <path d="M9 17l6 0"></path>
                    </svg><span>Laporan</span></a></li>
        @endif
        {{-- Menu User --}}
        @guest
            <li class="nav-item py-2 px-2"><a
                    class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                    href="{{ route('home.index') }}"><svg class="icon icon-tabler icon-tabler-layout-dashboard me-2"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4h6v8h-6z"></path>
                        <path d="M4 16h6v4h-6z"></path>
                        <path d="M14 12h6v8h-6z"></path>
                        <path d="M14 4h6v4h-6z"></path>
                    </svg><span>Home</span></a></li>
            <li class="nav-item py-2 px-2"><a class="nav-link {{ request()->routeIs('history.index') ? 'active' : '' }}"
                    href="{{ route('history.index') }}"><svg class="icon icon-tabler icon-tabler-history me-2"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 8l0 4l2 2"></path>
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                    </svg><span>History</span></a></li>
        @endguest
        @if (Auth::check() && Auth::user()->role == 'user')
            <li class="nav-item py-2 px-2"><a
                    class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                    href="{{ route('home.index') }}"><svg class="icon icon-tabler icon-tabler-layout-dashboard me-2"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4h6v8h-6z"></path>
                        <path d="M4 16h6v4h-6z"></path>
                        <path d="M14 12h6v8h-6z"></path>
                        <path d="M14 4h6v4h-6z"></path>
                    </svg><span>Home</span></a></li>
            <li class="nav-item py-2 px-2"><a
                    class="nav-link {{ request()->routeIs('history.index') ? 'active' : '' }}"
                    href="{{ route('history.index') }}"><svg class="icon icon-tabler icon-tabler-history me-2"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 8l0 4l2 2"></path>
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                    </svg><span>History</span></a></li>
        @endif
        @auth
            <li class="nav-item py-2 px-2"><a
                    class="nav-link {{ request()->routeIs('password.change') ? 'active' : '' }}"
                    href="{{ route('password.change') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                        height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-password-user me-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 17v4"></path>
                        <path d="M10 20l4 -2"></path>
                        <path d="M10 18l4 2"></path>
                        <path d="M5 17v4"></path>
                        <path d="M3 20l4 -2"></path>
                        <path d="M3 18l4 2"></path>
                        <path d="M19 17v4"></path>
                        <path d="M17 20l4 -2"></path>
                        <path d="M17 18l4 2"></path>
                        <path d="M9 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                        <path d="M7 14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2"></path>
                    </svg><span>Ganti Password</span></a></li>
            <li class="nav-item py-2 px-2"><a class="nav-link {{ request()->routeIs('auth.logout') ? 'active' : '' }}"
                    href="{{ route('auth.logout') }}"><svg class="icon icon-tabler icon-tabler-logout-2 me-2"
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                        <path d="M15 12h-12l3 -3"></path>
                        <path d="M6 15l-3 -3"></path>
                    </svg><span>Logout</span></a></li>
        @endauth
    </ul>
</div>

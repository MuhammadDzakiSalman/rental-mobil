<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100"><button class="btn btn-primary rounded-3" id="sidebarToggle"><i class="fas fa-bars"></i></button>
            <div class="d-flex align-items-center gap-1">
                @auth
                    <p class="mb-0">{{ auth()->user()->name }}</p>
                @else
                    <a href="{{ route('auth.login') }}" class="btn btn-primary rounded-3">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
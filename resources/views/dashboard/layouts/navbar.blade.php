<header class="navbar p-1 sticky-top bg-light p-0 shadow">
    <h4 class="brand">PerpusApp</h4>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link rounded text-white px-3 bg-danger border-0">Logout <span data-feather="log-out"></span></button>
        </form>
        </div>
    </div>
</header>
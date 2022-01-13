<!-- Mobile sidebar -->
<div class="col-2 d-block .d-sm-none d-md-none mb-3">
    <a class="" data-bs-toggle="offcanvas" href="#sidebar" role="button" aria-controls="sidebar">
        Menu
    </a>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header justify-content-end">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <div>
                <nav class="nav flex-column mt-5">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    <a class="nav-link {{ Request::is('entregas') ? 'active' : '' }}" aria-current="page" href="/entregas">Entregas</a>
                    <a class="nav-link {{ Request::is('clientes') ? 'active' : '' }}" href="/clientes">Clientes</a>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Desktop sidebar -->
<nav class="nav flex-column mt-5 d-none d-sm-block d-sm-none d-md-block p-0 col-md-2">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
    <a class="nav-link {{ Request::is('entregas') ? 'active' : '' }}" aria-current="page" href="/entregas">Entregas</a>
    <a class="nav-link {{ Request::is('clientes') ? 'active' : '' }}" href="/clientes">Clientes</a>
</nav>

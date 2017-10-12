<nav class="navbar navbar-expand-md fixed-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/Logo-Cosmo-Press.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav rm-right">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item {{ Request::is('page-about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('page-about') }}">About <span class="sr-only"></span></a>
                </li>
                <li class="nav-item {{ Request::is('journals') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('page-about') }}">Magazines <span class="sr-only"></span></a>
                </li>
                <li class="nav-item {{ Request::is('journals') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('page-about') }}">Publication <span class="sr-only"></span></a>
                </li>
                <li class="nav-item {{ Request::is('advertising') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('page-about') }}">Advertising <span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

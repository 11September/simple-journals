<nav id="navbar" class="navbar navbar-expand-md fixed-top bg-white">
    <div class="container">

        <div class="menu-wrapper">

            <a id="navbar-logo" class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="{{ asset('images/Logo.png') }}" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-align-right fa-2x" aria-hidden="true"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav rm-right">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home <span
                                    class="sr-only"></span></a>
                    </li>
                    <li class="nav-item {{ Request::is('page-about') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('page-about') ? 'active' : '' }}"
                           href="{{ url('page-about') }}">About
                            <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item {{ Request::is('magazines') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('magazines') ? 'active' : '' }}"
                           href="{{ url('magazines') }}">Magazines
                            <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item {{ Request::is('journals') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('page-publication') ? 'active' : '' }}"
                           href="{{ url('page-publication') }}">Publication <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item {{ Request::is('news') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('news') ? 'active' : '' }}"
                           href="{{ url('news') }}">Blog <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item {{ Request::is('advertising') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('page-advertisement') ? 'active' : '' }}"
                           href="{{ url('page-advertisement') }}">Advertising <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

{{--<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse bg-white">--}}

    {{--<div class="container">--}}

        {{--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"--}}
                {{--data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"--}}
                {{--aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<a id="navbar-logo" class="navbar-brand" href="/">--}}
            {{--<img class="logo" src="{{ asset('images/Logo-Cosmo-Press.png') }}" alt="logo">--}}
        {{--</a>--}}

        {{--<div class="collapse navbar-collapse" id="navbarCollapse">--}}
            {{--<ul class="navbar-nav ml-auto">--}}
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}

    {{--</div>--}}
{{--</nav>--}}

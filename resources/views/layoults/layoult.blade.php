<html lang="eng">
<head>
    @include('partials.head')

    @include('partials.css')

    @yield('css')
</head>
<body>

@include('partials.nav')

<div class="container wrapper-body">
    @yield('content')
</div>

@include('partials.footer')

@include('partials.scripts')

@yield('scripts')
</body>

</html>


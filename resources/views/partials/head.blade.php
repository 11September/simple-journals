<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{ asset('images/favicon/cropped-cropped-logo-1-32x32.png') }}" sizes="16x16" type="image/png">

<title>{{ Voyager::setting('title') }}</title>

<meta name="description" content="{{ Voyager::setting('description') }}">
<meta name="keywords" content="@yield('keywords')">
<meta name="csrf-token" content="{{ csrf_token() }}">


<meta name="author" content="">
<link rel="icon" href="favicon.ico">
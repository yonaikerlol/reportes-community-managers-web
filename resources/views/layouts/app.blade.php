<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Robots tags -->
    <meta name="robots" content="noindex, nofollow, noarchive" />
    <meta name="googlebot" content="noindex, nofollow, noarchive" />
    <meta name="googlebot-news" content="noindex, nofollow, noarchive" />
    <meta name="bingbot" content="noindex, nofollow, noarchive" />

    <!-- Browserconfig -->
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="{{ asset('icons/ms-icon-144x144.png') }}" />

    <meta name="theme-color" content="#ffffff" />

    <title>@yield('title') - {{ config('app.name', 'Reportes Community Manager\'s') }}</title>

    <!-- SEO Tags -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Favicon's -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icons/apple-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icons/apple-icon-60x60.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icons/apple-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icons/apple-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icons/apple-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icons/apple-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icons/apple-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icons/apple-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-icon-180x180.png') }}" />
    <link rel="icon" sizes="192x192" href="{{ asset('icons/android-icon-192x192.png') }}" />
    <link rel="icon" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}" />
    <link rel="icon" sizes="96x96" href="{{ asset('icons/favicon-96x96.png') }}" />
    <link rel="icon" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('site.webmanifest')  }}" />

    <!-- Styles -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/dist/app.css') }}" />
@yield('head')

    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
@include('layouts.parcials.navbar')

    <main>
        <div class="container">
@yield('content')
        </div>
    </main>

@include('layouts.parcials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dist/app.js') }}"></script>
@if (Session::has('status'))
    <script>
        M.toast({
            html: "{{ Session::get('status') }}"
        });
    </script>
@endif

@yield('body')
</body>

</html>

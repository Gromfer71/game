<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Main styles -->
    <link href="{{ asset('css/null.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>

    @yield('styles')
</head>
<body>

<div class="container">
    @if(session('ok'))
            <div class="isa_success">
                <h1>{{session('ok')}}</h1>
            </div>
    @endif
    @if(session('error'))
        <div class="isa_error">
            <h1>{{session('error')}}</h1>
        </div>
    @endif

    @yield('content')

    @auth
        @include('templates.footer')
    @endauth
</div>

</body>


    @yield('scripts')



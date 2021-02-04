<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <!-- Main styles -->


    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>



    <link href="{{ asset('ulkit/css/uikit.min.css') }}" rel="stylesheet">

    <script src="{{ asset('ulkit/js/uikit.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.13/dist/js/uikit-icons.min.js"></script>

    @yield('styles')
</head>
<body style=" background: url('/img/bg.jpg') 100% repeat;">


<div class="uk-container uk-container-xsmall">
    @if($errors->any())
        <script>
            UIkit.notification({message: '<div class="uk-alert-danger">{{ $errors->first() }}</div>', pos: 'bottom-right'})
        </script>
        @endif
    @if($errors->has('login'))
        <div class="uk-alert-danger uk-margin-remove" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ $errors->first('login') }}</p>
        </div>
    @endif
    @if($errors->has('password'))
            <div class="uk-alert-danger uk-margin-remove" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $errors->first('password') }}</p>
            </div>
    @endif
    @if(session('ok'))
            <script>
                UIkit.notification({message: '<div class="uk-alert-success">{{ session('ok') }}</div>', pos: 'bottom-right'})
            </script>
    @endif
    @if(session('error'))
            <script>
                UIkit.notification({message: '<div class="uk-alert-danger">{{ session('error') }}</div>', pos: 'bottom-right'})
            </script>
    @endif
    @yield('content')

    @auth
        @include('templates.footer')
    @endauth
</div>

</body>
    @yield('scripts')



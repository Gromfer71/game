@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Тренировать войска", 'backUrl' => ''])

    <div class="uk-card uk-card-default uk-card-body uk-text-center">
        <div class="uk-card-header">
            <div class="uk-card-title uk-text-large uk-margin-bottom">
                Войска обучаются.
            </div>
            <div class="uk-flex uk-flex-center uk-margin-bottom">
                @include('templates.countDown', ['time' => $time])
            </div>
            <div class="uk-flex uk-flex-around uk-flex-wrap">
                @foreach($troops as $troop)
                    <div>
                        <img src="{{ asset('img/'.$troop->baseTroop->category.$troop->baseTroop->lv.'.png') }}" alt="warrior" width="128" height="256">
                        <p>{{ __('mes.'.$troop->baseTroop->category.$troop->baseTroop->lv) }}  {{ $troop->count }} шт.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
            setTimeout(location.reload.bind(location), parseInt("{{ $time - time() }}") * 1000);
    </script>
@endsection

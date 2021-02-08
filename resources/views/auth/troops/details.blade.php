@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Войска", 'backUrl' => ''])

    <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-header uk-margin-bottom">
            <div class="uk-card-title uk-text-large">
                    Обзор войск
            </div>
        </div>
        <div class="uk-flex uk-flex-around uk-flex-wrap uk-text-center">
            @foreach($troops as $troop)
                <div>
                    <img src="{{ asset('img/'.$troop->baseTroop->category.$troop->baseTroop->lv.'.png') }}" width="128" height="256" alt="warrior">
                    <p>{{ __('mes.'.$troop->baseTroop->category.$troop->baseTroop->lv) }}  {{ $troop->count }} шт.</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

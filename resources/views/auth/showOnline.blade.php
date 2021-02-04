@extends('layouts.header')
<title>Онлайн</title>
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/showOnline.css') }}">
@endsection

@section('content')

    @include('templates.contentHeader', ['title' => 'Онлайн', 'backUrl' => ''])
    <div class="uk-container uk-container-small uk-background-default">
        @foreach($users as $user)
            <div class="uk-card uk-card-default uk-flex uk-flex-between uk-padding-small uk-border-rounded">
                <div>
                    <h3 class="uk-card-title uk-width-1-3">{{ $user->login }}</h3>
                </div>
                <div class="uk-width-1-3">
                    <a href="{{ route('dialog', $user->id) }}" class="uk-button uk-button-primary">Написать</a>
                </div>
            </div>
        @endforeach
            {{ $users->links('vendor.pagination.default') }}
    </div>












{{--        @foreach($users as $user)--}}

{{--            <div class="links__item short">--}}
{{--                {{ $user->login }}--}}
{{--            </div>--}}
{{--            @if($user->id != Auth::user()->id)--}}
{{--                <a href="{{ route('dialog', $user->id) }}">--}}
{{--                    <img class="btn_link" src="{{ asset("img/btn_brown.png") }}" alt="">--}}
{{--                    <span class="btn">--}}
{{--                        Написать--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            @else--}}
{{--                <a href="#">--}}
{{--                    <img class="btn_link" src="{{ asset("img/btn_brown.png") }}" alt="">--}}
{{--                    <span class="btn">--}}
{{--                    Это Вы--}}
{{--                </span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--        @endforeach--}}
@endsection

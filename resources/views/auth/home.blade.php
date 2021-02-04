@extends('layouts.header')
    <title>Главная</title>
@section('content')
        @include('templates.contentHeader', ['title' => 'Главная', 'backUrl' => "logout"])

        <div class="uk-background-secondary">
            <a href="{{ route('online') }}" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">
                <span class="">Онлайн</span>
            </a>
            <a href="{{ route('buildings') }}" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">
                <span class="">Строения</span>
            </a>
            <a href="{{ route('troops.index') }}" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">
                <span class="">Войска</span>
            </a>
            <a href="{{ route('monsters.search') }}" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">
                <span class="">Монстры</span>
            </a>
        </div>
{{--        <div class="content__links">--}}
{{--            <a href="{{ route('online') }}">--}}
{{--                <div class="links__item">--}}
{{--                    <span>Онлайн</span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="content__links">--}}
{{--            <a href="{{ route('buildings') }}">--}}
{{--                <div class="links__item">--}}
{{--                    <span>Строения</span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="content__links">--}}
{{--            <a href="{{ route('troops.index') }}">--}}
{{--                <div class="links__item">--}}
{{--                    <span>Тренировать войска</span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    <div class="content__links">--}}
{{--        <a href="{{ route('troops.details') }}">--}}
{{--            <div class="links__item">--}}
{{--                <span>Войска</span>--}}
{{--            </div>--}}
{{--        </a>--}}

{{--    </div>--}}
{{--        <div class="content__links">--}}
{{--            <a href="{{ route('monsters.search') }}">--}}
{{--                <div class="links__item">--}}
{{--                    <span>Монстры</span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
@endsection


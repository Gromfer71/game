@extends('layouts.header')
    <title>Главная</title>

@section('content')
    <?php /** @var Auth $me  */ ?>
        @include('templates.contentHeader', ['title' => 'Главная ('.$me->login.')', 'backUrl' => "logout"])
        <div class="content__links">
            <a href="{{ route('online') }}">
                <div class="links__item">
                    <span>Онлайн</span>
                </div>
            </a>
        </div>
        <div class="content__links">
            <a href="{{ route('buildings') }}">
                <div class="links__item">
                    <span>Строения</span>
                </div>
            </a>
        </div>
        <div class="content__links">
            <a href="{{ route('troops.index') }}">
                <div class="links__item">
                    <span>Тренировать войска</span>
                </div>
            </a>
        </div>
        <div class="content__links">
            <a href="{{ route('monsters.index') }}">
                <div class="links__item">
                    <span>Монстры</span>
                </div>
            </a>
        </div>
    </div>
@endsection


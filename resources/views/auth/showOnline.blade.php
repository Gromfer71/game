@extends('layouts.header')
<title>Онлайн</title>
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/showOnline.css') }}">
@endsection

@section('content')

    @include('templates.contentHeader', ['title' => 'Онлайн', 'backUrl' => ''])
    <div class="content__links">
        @foreach($users as $user)

            <div class="links__item short">
                {{ $user->login }}
            </div>
            @if($user->id != Auth::user()->id)
                <a href="{{ route('dialog', $user->id) }}">
                    <img class="btn_link" src="{{ asset("img/btn_brown.png") }}" alt="">
                    <span class="btn">
                        Написать
                    </span>
                </a>
            @else
                <a href="#">
                    <img class="btn_link" src="{{ asset("img/btn_brown.png") }}" alt="">
                    <span class="btn">
                    Это Вы
                </span>
                </a>
            @endif

        @endforeach
    </div>
@endsection

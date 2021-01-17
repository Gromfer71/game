@extends('layouts.header')
<title>Почта</title>

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endsection

@section('content')
    @include('templates.contentHeader', ['title' => 'Почта', 'backUrl' => ''])
    <div class="ui_back">
        <a href="{{ route('dialogs') }}">
            <div class="mail__item">
                <img class="mail__icon" src="{{ asset('img/icons/message.png') }}" alt="messages">
                <span class="mail__title">
                         Сообщения
                </span>
                <img class="mail__go" src="{{ asset('img/icons/set_btn.png') }}" alt="messages">
                <hr>
            </div>
        </a>

        <a href="{{ route('systemMessages') }}">
            <div class="mail__item">
                <img class="mail__icon" src="{{ asset('img/icons/message.png') }}" alt="messages">
                <span class="mail__title">
                         Система
                    </span>
                <img class="mail__go" src="{{ asset('img/icons/set_btn.png') }}" alt="messages">
                <hr>
            </div>
        </a>

        <a href="{{ route('dialogs') }}">
            <div class="mail__item">
                <img class="mail__icon" src="{{ asset('img/icons/message.png') }}" alt="messages">
                <span class="mail__title">
                         Сообщения
                    </span>
                <img class="mail__go" src="{{ asset('img/icons/set_btn.png') }}" alt="messages">
                <hr>
            </div>
        </a>

        <a href="{{ route('dialogs') }}">
            <div class="mail__item">
                <img class="mail__icon" src="{{ asset('img/icons/message.png') }}" alt="messages">
                <span class="mail__title">
                         Сообщения
                    </span>
                <img class="mail__go" src="{{ asset('img/icons/set_btn.png') }}" alt="messages">
                <hr>
            </div>
        </a>
    </div>



@endsection



@extends('layouts.header')
<title>Диалоги</title>
@section('styles')
    <link rel="stylesheet" href="{{ asset("css/dialogs.css") }}">
@endsection

@section('content')
    <? /** @var \App\Models\Message $message */ ?>
    @include('templates.contentHeader', ['backUrl' => route('mailMain'), 'title' => 'Диалоги' ])

    <div class="mail__content">
        @if(empty($messages[0]))
            <h2 style="font-size: 24px; padding: 20px;">
                <center>Пусто</center>
            </h2>
        @endif
        @foreach($messages as $message)

            <a href="{{ route('dialog', $message->from == Auth::user()->id ? $message->to : $message->from) }}">
                <div class="dialog__item">
                    <img class="mail__icon" src="{{ asset('img/mailnormal.png') }}" alt="mailicon">
                    <div class="mail__from">
                        {{$message->from_login}}
                    </div>
                    <div class="mail__message">
                        {{$message->message}}
                    </div>
                    <div class="message__date">
                      {{ $message->created_at  }}
                    </div>
                    <hr>
                </div>
            </a>
            <br>
        @endforeach
    </div>
@endsection

@extends('layouts.header')
<title>Системные сообщения</title>
@section('styles')
    <link rel="stylesheet" href="{{ asset("css/dialogs.css") }}">
@endsection

@section('content')
    @include('templates.contentHeader', ['backUrl' => route('mailMain'), 'title' => 'Системные сообщения' ])
    <div class="mail__content">
        @if(empty($messages))
            <h2 style="font-size: 24px; padding: 20px;"><center>Пусто</center></h2>
        @endif
        @foreach($messages as $message)
            <a href="{{ route('systemMessages.show', $message->id) }}">
                <div class="dialog__item">
                    <img class="mail__icon" src="{{ asset('img/mailnormal.png') }}" alt="mailicon">
                    <div class="mail__from">
                        {{__("mes.".$message->category)}}
                    </div>
                    <div class="mail__message">
                        {{$message->title}}
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

@extends('layouts.header')
<title>Сообщения</title>
@section('content')
<?php
/** @var \App\Models\User $withUser
 * @var \App\Models\Message[] $messages, $message
 */ ?>
    @include('templates.contentHeader', ['backUrl' => route('dialogs'), 'title' => $withUser->login ])

    <div class="messageBox">
        @foreach($messages as $message)
            <div class="messageBox__item {{ $withUser->id == $message->from ? "toMe" : "" }}">
                <span class="fromLogin">
                    {{ $message->from_login }}
                </span>
                <div class="message">
                    {{ $message->message }}
                </div>
            </div>
        @endforeach
    </div>
    <form method="POST" action="{{ route('dialogSend') }}">
        @csrf
        <div class="sendMessageForm">
            <input type="text" name="message" class="sendMessageForm__input" id="input">
            <input type="text" name="to" value="{{ $withUser->id }}" hidden>
            <div class="sendMessageForm__sendButton">
                <button type="submit">
                    <img src="{{ asset('img/icons/sendMessageButton.png') }}" alt="sendMessageButton">
                </button>
            </div>
        </div>
    </form>

    <script>
        {{--document.addEventListener("DOMContentLoaded", () => {--}}
        {{--    let token = document.querySelector('meta[name="csrf-token"]').content;--}}
        {{--    let messageBox = document.querySelector('.messageBox');--}}
        {{--    messageBox.scrollTop = messageBox.scrollHeight;--}}
        {{--    document.querySelector('form').addEventListener('submit', function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        let request = new XMLHttpRequest();--}}
        {{--        request.open(this.method, this.action, true);--}}
        {{--        request.setRequestHeader('X-CSRF-TOKEN', token);--}}
        {{--        let data = new FormData(this);--}}
        {{--        request.send(data);--}}

        {{--        request.addEventListener("readystatechange", () => {--}}
        {{--            if (request.readyState === 4) {--}}

        {{--                let result = request.response;--}}
        {{--                result = JSON.parse(result);--}}
        {{--                if(request.status === 422) {--}}
        {{--                     for(let i=0; i<result.errors['message'].length; i++)--}}
        {{--                     {--}}
        {{--                         $('.messageBox').before(result.errors['message'][i]);--}}
        {{--                     }--}}

        {{--                }--}}



        {{--                let message =--}}
        {{--                    '<div class="messageBox__item {{ (isset($messages[0])) ?? ($withUser->id == $messages[0]->from ? "toMe" : "")  }}">' +--}}
        {{--                        '<span class="fromLogin">' +--}}
        {{--                            result['message']['from_login'] +--}}
        {{--                        '</span>' +--}}
        {{--                        '<div class="message">' +--}}
        {{--                            result['message']['message'] +--}}
        {{--                        '</div></div>';--}}

        {{--                messageBox.insertAdjacentHTML('beforeend', message);--}}
        {{--                messageBox.scrollTop = messageBox.scrollHeight;--}}
        {{--            }--}}
        {{--        });--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection

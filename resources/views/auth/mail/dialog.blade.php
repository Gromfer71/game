@extends('layouts.header')

<title>Сообщения</title>

@section('content')
    @include('templates.contentHeader', ['backUrl' => route('dialogs'), 'title' => $withUser->login ])

<div id="message__container" class="uk-container-small uk-overflow-auto uk-height-large">
    @if($messages->count() == 0)
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <span class="uk-text-large uk-text-bold uk-text-uppercase">История сообщений пуста</span>
            </div>
        </div>
    @endif
    @foreach($messages as $message)
        <div class="uk-card uk-card-default uk-margin-small uk-border-rounded">
            <div class="uk-card-title {{ $withUser->id == $message->from ? 'uk-text-left uk-margin-left' : 'uk-text-right uk-margin-right' }}">
                {{ $message->from_login }}
            </div>
            <div class="uk-card-body uk-padding-small">
                {{ $message->message }}
            </div>
        </div>
    @endforeach
</div>

    <form method="POST" action="{{ route('dialogSend') }}">
        @csrf
            <div class="uk-margin">
                <textarea class="uk-textarea" name="message" rows="5" placeholder="Введите сообщение..."></textarea>
            </div>
            <input type="text" name="to" value="{{ $withUser->id }}" hidden>
                <button type="submit" class="uk-button uk-button-primary">
                    Отправить
                </button>
    </form>

<script>
 let div = $('#message__container');
 div.scrollTop(div.prop('scrollHeight'));
</script>
@endsection


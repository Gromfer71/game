@extends('layouts.header')
<title>Диалоги</title>


@section('content')
    <? /** @var \App\Models\Message $message */ ?>
    @include('templates.contentHeader', ['backUrl' => route('mailMain'), 'title' => 'Диалоги' ])
        @if(empty($messages[0]))
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <span class="uk-text-large uk-text-bold uk-text-uppercase">Пусто</span>
                </div>
            </div>
        @endif
        @foreach($messages as $message)
                <a href="{{ route('dialog', $message->from == Auth::user()->id ? $message->to : $message->from) }}" class="uk-link-toggle">
                    <div class="uk-card uk-card-default uk-margin uk-border-rounded">
                        <div class="uk-card-title uk-align-right uk-margin-right">
                            @if($message->from == Auth::user()->id)
                                {{ $message->to_login }}
                            @else
                                {{ $message->from_login }}
                            @endif
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            {{$message->message}}
                        </div>
                    </div>
                </a>
        @endforeach
@endsection

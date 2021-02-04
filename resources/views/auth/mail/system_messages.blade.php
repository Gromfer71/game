@extends('layouts.header')
<title>Системные сообщения</title>
@section('content')
    @include('templates.contentHeader', ['backUrl' => route('mailMain'), 'title' => 'Системные сообщения' ])
        @if(empty($messages))
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <span class="uk-text-large uk-text-bold uk-text-uppercase">Пусто</span>
                </div>
            </div>
        @endif
        @foreach($messages as $message)
            <a href="{{ route('systemMessages.show', $message->id) }}" class="uk-link-toggle">
                <div class="uk-card uk-card-default uk-margin uk-border-rounded">
                    <div class="uk-card-header uk-padding-small">
                        {{__("mes.".$message->category)}}
                    </div>
                    <div class="uk-card-body uk-padding-small">
                        {{$message->title}}
                        <div class="uk-align-right">
                            {{$message->created_at}}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
@endsection

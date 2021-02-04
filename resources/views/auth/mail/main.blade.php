@extends('layouts.header')
<title>Почта</title>

@section('content')
    @include('templates.contentHeader', ['title' => 'Почта', 'backUrl' => ''])
    <a href="{{ route('dialogs') }}" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">Сообщения</a>
    <a href="{{ route('systemMessages') }}" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">Система</a>
    <a href="#" class="uk-button uk-button-primary uk-button-large uk-align-center uk-margin-small">Отчёты ПВЕ</a>
@endsection



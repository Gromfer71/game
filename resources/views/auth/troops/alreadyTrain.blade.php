@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Тренировать войска", 'backUrl' => ''])

    <div class="ui_back">
        <div>
            <p>Войска обучаются. Осталось</p>
            <br>
                {{ $time }}
            <hr>
            <div class="progress-bar">
                <progress id="progressBar" max="100" value="77"></progress>
            </div>
                @foreach($troops as $troop)
                    <p>{{ __('mes.'.$troop->baseTroop->category.$troop->baseTroop->lv) }}  {{ $troop->count }} шт.</p>
                @endforeach
        </div>
    </div>


@endsection

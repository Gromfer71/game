@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Тренировать войска", 'backUrl' => ''])

        <div class="ui_back">

            <form action="{{ route('troops.train') }}" method="POST">
                @csrf
                <input type="range" min="0" max="100" step="1" value="0" name="1">
                <input type="range" min="0" max="100" step="1" value="0" name="2">
                <button type="submit">Тренировать</button>
            </form>
        </div>

@endsection

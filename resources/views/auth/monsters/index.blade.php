@extends('layouts.header')
<title>Монстры</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Монстры", 'backUrl' => ''])

    <button class="uk-button uk-button-danger">qweqwe</button>

{{--    <div class="ui_back">--}}
{{--        <form action="{{ route('monsters.attack') }}" method="POST">--}}
{{--            <div class="monsters__search">--}}
{{--                <label>--}}
{{--                    <input type="range" class="range" min="1" max="5">--}}
{{--                </label>--}}
{{--                <span id="monster__info"></span>--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <button type="submit" class="btn green">Поиск</button>--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        $('document').ready(function () {--}}
{{--            $('input[type=range]').on('input', function () {--}}
{{--              $('#monster__info').html($('input[type=range]').val() + " Уровень");--}}
{{--            })--}}

{{--        })--}}
{{--    </script>--}}
@endsection

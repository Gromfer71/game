@extends('layouts.header')
<title>Монстры</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Монстры", 'backUrl' => ''])

    <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-header">
            <div class="uk-card-title">
                Поиск
            </div>
        </div>
        <form action="{{ route('monsters.monsterInfo') }}" method="POST">
            @csrf
            <input type="range" class="uk-range uk-margin-bottom" min="1" max="5" name="lv">
            <div class="uk-flex uk-flex-middle uk-flex-between">
                <button class="uk-button uk-button-primary" type="submit">Поиск</button>
                <div id="lvInfo" class="uk-text-large"></div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('input[type=range]').on('input', function () {
                $('#lvInfo').html($(this).val())
            });
        });
    </script>

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

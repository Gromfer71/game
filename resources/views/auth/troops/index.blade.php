@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Тренировать войска", 'backUrl' => ''])

    <form action="{{ route('troops.train') }}" method="POST">
        @csrf
        <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
            <div class="uk-flex uk-flex-around">
                <div>
                    <div class="uk-text-center uk-margin-bottom">
                        Воин
                    </div>
                    <div class="uk-margin-bottom">
                        <img src="{{ asset('img/warrior1.png') }}" alt="">
                    </div>
                    <div>
                        <input type="range" class="uk-width-4-5" min="0" max="100" step="1" value="0" name="1">
                        <span id="war1">0</span>
                    </div>
                </div>
                <div>
                    <div class="uk-text-center uk-margin-bottom">
                        Копейщик
                    </div>
                    <div class="uk-margin-bottom">
                        <img src="{{ asset('img/warrior2.png') }}" alt="">
                    </div>
                    <div>
                        <input type="range" class="uk-width-4-5" min="0" max="100" step="1" value="0" name="2">
                        <span id="war2">0</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="uk-card uk-card-default uk-card-default">
            <div class="uk-flex uk-padding-small uk-flex-middle" id="res">
                <div class="uk-margin-right uk-width-1-4">
                    <img src="{{ asset("img/icons/ui_food.png") }}" alt="foodicon">
                    <span id="food">0</span>
                </div>
                <div class="uk-margin-right uk-width-1-4">
                    <img src="{{ asset("img/icons/ui_wood.png") }}" alt="woodicon">
                    <span id="wood">0</span>
                </div>
                <div class="uk-margin-right uk-width-1-4">
                    <img src="{{ asset("img/icons/ui_iron.png") }}" alt="ironicon">
                    <span id="iron">0</span>
                </div>
                <div class="uk-margin-right uk-width-1-4">
                    <img src="{{ asset("img/icons/ui_mithril.png") }}" alt="mithrilicon">
                    <span id="mithril">0</span>
                </div>
                <div>
                    <button class="uk-button uk-button-primary uk-margin-auto-vertical" type="submit">
                        Тренировать
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $('document').ready(function () {
            let foodcount = 0;
            let woodcount = 0;
            let ironcount = 0;
            let mithrilcount = 0;
            let food = new Map([
                ['1', "{{ $base->find(1)->cost->food }}"],
                ['2', "{{ $base->find(2)->cost->food }}"],
            ])
            let wood = new Map([
                ['1', "{{ $base->find(1)->cost->wood }}"],
                ['2', "{{ $base->find(2)->cost->wood }}"],
            ])
            let iron = new Map([
                ['1', "{{ $base->find(1)->cost->iron }}"],
                ['2', "{{ $base->find(2)->cost->iron }}"],
            ])
            let mithril = new Map([
                ['1', "{{ $base->find(1)->cost->mithril }}"],
                ['2', "{{ $base->find(2)->cost->mithril }}"],
            ])
            $('input[type=range]').on('input', function () {
                $('#war' + $(this).attr('name')).html($(this).val());

                $('input[type=range]').each(function () {
                    foodcount += $(this).val() * food.get($(this).attr('name'));
                    woodcount += $(this).val() * wood.get($(this).attr('name'));
                    ironcount += $(this).val() * iron.get($(this).attr('name'));
                    mithrilcount += $(this).val() * mithril.get($(this).attr('name'));
                })
                $('#food').html(foodcount);
                $('#wood').html(woodcount);
                $('#iron').html(ironcount);
                $('#mithril').html(mithrilcount);
                foodcount = 0;
                woodcount = 0;
                ironcount = 0;
                mithrilcount = 0;
            })
        })
    </script>
@endsection

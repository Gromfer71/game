@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Тренировать войска", 'backUrl' => ''])

    <div class="ui_back">
        <form action="{{ route('troops.train') }}" method="POST">
            @csrf
            <img src="{{ asset('img/warrior1.png') }}" alt="">
            <label>
                Воин
                <input type="range" min="0" max="100" step="1" value="0" name="1">
            </label>
            <span id="war1"></span>
            <br>
            <hr>
            <br>
            <img src="{{ asset('img/warrior2.png') }}" alt="">
            <label>
                Копейщик
                <input type="range" min="0" max="100" step="1" value="0" name="2">
            </label>
            <span id="war2"></span>
            <div class="flex" id="res">
                <div class="resources__item">
                    <img src="{{ asset("img/icons/ui_food.png") }}" alt="foodicon">
                    <span id="food">0</span>
                </div>
                <div class="resources__item">
                    <img src="{{ asset("img/icons/ui_wood.png") }}" alt="foodicon">
                    <span id="wood">0</span>
                </div>
                <div class="resources__item">
                    <img src="{{ asset("img/icons/ui_iron.png") }}" alt="foodicon">
                    <span id="iron">0</span>
                </div>
                <div class="resources__item">
                    <img src="{{ asset("img/icons/ui_mithril.png") }}" alt="foodicon">
                    <span id="mithril">0</span>
                </div>
            </div>
            <div>
                <button class="btn fufei" type="submit">Тренировать</button>
            </div>
        </form>
    </div>

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

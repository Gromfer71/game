@extends('layouts.header')
<title>Улучшение</title>

@section('styles')
    <link rel="stylesheet" href="{{ asset("css/buildings/upgrade.css") }}">
@endsection

@section('content')

    @include('templates.contentHeader', ['title' => 'Улучшение', 'backUrl' => route('buildings')])
    <div class="ui_back">
        <div class="lv__img">
            <span>ур {{ $building->baseBuilding->lv }}</span>
        </div>
        <span class="title">{{ __("mes.".$building->baseBuilding->category) }}</span>

        <img class="polotno" src="{{ asset("img/link_background.png") }}" width="535px" height="200px" alt="">
        <div class="res">
            <div class="res__box">
                <div class="box__item">
                    <img src="{{ asset('img/icons/ui_food.png') }}" width="32px" height="32px" alt="foodicon">
                </div>
                <div class="box__item">
                    {{ $building->baseBuilding->food_up }}
                </div>
                <div class="box__item">
                    @if(Auth::user()->food >= $building->baseBuilding->food_up)
                        <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
                    @else
                        <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
                    @endif
                </div>
            </div>
            <div class="res__box">
                <div class="box__item">
                    <img src="{{ asset('img/icons/ui_wood.png') }}" width="32px" height="32px" alt="foodicon">
                </div>
                <div class="box__item">
                    {{ $building->baseBuilding->wood_up }}
                </div>
                @if(Auth::user()->wood >= $building->baseBuilding->wood_up)
                    <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
                @else
                    <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
                @endif

            </div>
            <div class="res__box">
                <div class="box__item">
                    <img src="{{ asset('img/icons/ui_iron.png') }}" width="32px" height="32px" alt="foodicon">
                </div>
                <div class="box__item">
                    {{ $building->baseBuilding->iron_up }}
                </div>
                @if(Auth::user()->iron >= $building->baseBuilding->iron_up)
                    <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
                @else
                    <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
                @endif
            </div>
            <div class="res__box">
                <div class="box__item">
                    <img src="{{ asset('img/icons/ui_mithril.png') }}" width="32px" height="32px" alt="foodicon">
                </div>
                <div class="box__item">
                    {{ $building->baseBuilding->mithril_up }}
                </div>
                @if(Auth::user()->mithril >= $building->baseBuilding->mithril_up)
                    <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
                @else
                    <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
                @endif
            </div>
            <form method="POST" action="{{ route('buildingUpgrade') }}">
                @csrf
                <label>
                    <input type="text" hidden value="{{ $building->id }}" name="id">
                </label>
                <button type="submit" class="submit_upgrade">Улучшить</button>
            </form>
                <div class="upgrade_time">
                    Время улучшения: {{ date("H:i:s", $building->baseBuilding->time_up) }}
                </div>
        </div>

    </div>

@endsection


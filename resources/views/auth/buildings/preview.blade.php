@extends('layouts.header')
<title>Главная</title>

@section('styles')
@endsection

@section('content')
    @include('templates.contentHeader', ['title' => 'Строения', 'backUrl' => route('home')])
    <div class="ui_back">

        @foreach($buildings as $building)
            @if($building->baseBuilding()->lv === 0)
                <div class="building">
                    <img src="{{ asset('img/link_background.png') }}" width="500x" height="200px" alt="bg">
                    <img class="b__img" src="{{ asset("img/".$building->baseBuilding()->category.".png") }}"
                         width="150px" height="150px" alt="{{ $building->baseBuilding()->category }}">
                    <div class="building__desc">{{ __("mes.{$building->baseBuilding()->category}Describe") }}</div>
                    <div class="building__info">
                        <a href="{{ route('buildingUpgradeMenu', $building->id) }}"><button class="btn fufei">Построить</button></a>
                    </div>
                </div>
            @else
                <div class="building">
                    <img src="{{ asset('img/link_background.png') }}" width="500x" height="200px" alt="bg">
                    <img class="b__img" src="{{ asset("img/".$building->baseBuilding()->category.".png") }}"
                         width="150px" height="150px" alt="{{ $building->baseBuilding()->category }}">
                    <div class="building__lv">Ур. {{ $building->baseBuilding()->lv }}</div>
                    <div class="building__desc">{{ __("mes.{$building->baseBuilding()->category}Describe") }}</div>
                    <div class="building__info">
                        <a href="{{ route('building.show', $building->id) }}"><button class="btn fufei">Детали</button></a>
                        <a href="{{ route('buildingUpgradeMenu', $building->id) }}"><button class="btn fufei">Улучшить</button></a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>




@endsection

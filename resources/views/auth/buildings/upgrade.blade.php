@extends('layouts.header')
<title>Улучшение</title>

@section('content')

    @include('templates.contentHeader', ['title' => 'Улучшение', 'backUrl' => route('buildings')])

    <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-header uk-flex uk-flex-around">
            <div class="uk-card-title">
                {{ __("mes.".$building->baseBuilding->category) }}
            </div>
            <div class="uk-card-title">
                Уровень {{ $building->baseBuilding->lv }}
            </div>
        </div>
        <div class="uk-margin">
            <img src="{{ asset('img/icons/ui_food.png') }}" width="32px" height="32px" alt="foodicon">
            <span class="uk-text-large">{{ $building->baseBuilding->food_up }}</span>
            @if(Auth::user()->food >= $building->baseBuilding->food_up)
                <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
            @else
                <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
            @endif
        </div>
        <div class="uk-margin">
            <img src="{{ asset('img/icons/ui_wood.png') }}" width="32px" height="32px" alt="foodicon">
            <span class="uk-text-large">{{ $building->baseBuilding->wood_up }}</span>
            @if(Auth::user()->wood >= $building->baseBuilding->wood_up)
                <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
            @else
                <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
            @endif
        </div>
        <div class="uk-margin">
            <img src="{{ asset('img/icons/ui_iron.png') }}" width="32px" height="32px" alt="foodicon">
            <span class="uk-text-large">{{ $building->baseBuilding->iron_up }}</span>
            @if(Auth::user()->iron >= $building->baseBuilding->iron_up)
                <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
            @else
                <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
            @endif
        </div>
        <div class="uk-margin">
            <img src="{{ asset('img/icons/ui_mithril.png') }}" width="32px" height="32px" alt="foodicon">
            <span class="uk-text-large">{{ $building->baseBuilding->mithril_up }}</span>
            @if(Auth::user()->mithril >= $building->baseBuilding->mithril_up)
                <img src="{{ asset('img/icons/success.png') }}" width="32px" alt="success">
            @else
                <img src="{{ asset('img/icons/wrong.png') }}" width="32px" alt="success">
            @endif
        </div>
        <div class="uk-flex uk-flex-around">
            <form action="{{ route('buildingUpgrade') }}" method="POST">
                @csrf
                <input type="text" hidden name="id" value="{{ $building->id }}">
                <button type="submit" class="uk-button uk-button-primary">
                    @if($building->baseBuilding->lv == 0)
                        Построить
                    @else
                        Улучшить
                    @endif
                </button>
            </form>
            <div class="uk-text-large">
                Время: {{ date("H:i:s", $building->baseBuilding->time_up) }}
            </div>
        </div>
    </div>
@endsection


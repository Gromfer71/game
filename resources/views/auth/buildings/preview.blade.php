@extends('layouts.header')
<title>Главная</title>

@section('styles')
@endsection

@section('content')
    @include('templates.contentHeader', ['title' => 'Строения', 'backUrl' => route('home')])
    @foreach($buildings as $building)
        <div class="uk-card uk-card-default uk-card-body uk-padding-small uk-margin-small-bottom">
            <div class="uk-card-header">
                <div class="uk-card-title">
                    {{ __('mes.'.$building->baseBuilding->category) }} @if($building->baseBuilding->lv > 0)
                        (Уровень {{ $building->baseBuilding->lv }}) @endif
                </div>
            </div>
            <div class="uk-flex uk-flex-around">
                <img src="{{ asset("img/".$building->baseBuilding->category.".png") }}" class="uk-height-max-small "
                     width="150px" height="150px" alt="{{ $building->baseBuilding->category }}">
                <div class="uk-grid">
                    <div
                        class="uk-text-large uk-margin-small-left">{{ __("mes.{$building->baseBuilding->category}Describe") }} </div>
                    <div class="uk-flex">
                    @if($building->lv_upping_time > time())
                            <div class="uk-text-large uk-margin-left">
                                Осталось:
                            </div>
                            <div class="uk-grid-small uk-child-width-auto uk-margin-left" uk-grid
                                 uk-countdown="date: {{ \Illuminate\Support\Carbon::createFromTimestamp($building->lv_upping_time)->toIso8601String() }}">
                                <div>
                                    <div class="uk-countdown-number uk-countdown-days uk-text-large"></div>
                                </div>
                                <div class="uk-countdown-separator uk-text-large">:</div>
                                <div>
                                    <div class="uk-countdown-number uk-countdown-hours uk-text-large"></div>
                                </div>
                                <div class="uk-countdown-separator uk-text-large">:</div>
                                <div>
                                    <div class="uk-countdown-number uk-countdown-minutes uk-text-large"></div>
                                </div>
                                <div class="uk-countdown-separator uk-text-large">:</div>
                                <div>
                                    <div class="uk-countdown-number uk-countdown-seconds uk-text-large"></div>
                                </div>
                            </div>
                    @else
                        <a href="{{ route('buildingUpgradeMenu', $building->id) }}"
                            class="uk-button uk-button-primary uk-align-left uk-margin-large-left  uk-margin-top">
                         123
                        </a>
                    @endif

                    @if($building->baseBuilding->lv != 0)
                        <div>
                            <a href="{{ route('building.show', $building->id) }}"
                               class="uk-button uk-button-primary uk-margin-large-left  uk-margin-top">
                                Детали
                            </a>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        let timers = [];
        @foreach($buildings as $building)
        @if($building->lv_upping_time > time())
        timers.push(parseInt("{{ $building->lv_upping_time - time() }}"))
        @endif
        @endforeach

        let minTimer = 0;
        console.log(timers)
        if (timers.length > 0) {
            minTimer = Math.min(...timers)
        }
        if (minTimer > 0) {
            setTimeout(location.reload.bind(location), minTimer * 1000 + 500);
        }

    </script>
@endsection

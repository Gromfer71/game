@extends('layouts.header')

@section('styles')
    <link rel="stylesheet" href="{{ asset("css/buildings/details.css") }}">
@endsection

@section('content')
    @include('templates.contentHeader', ['title' => __("mes.".$building->baseBuilding->category), 'backUrl' => route('buildings')])
    <div class="ui_back">
        <img class=ui_back__img" src="{{ asset("img/link_background.png") }}" alt="">
        <span class="b_desc">{{ __('mes.'.$building->baseBuilding->category.'Describe') }}</span>
        <div class="building__prop">
            <img src="{{ asset("img/video_bg.9.png") }}" width="500px" height="300px" alt="">
            <div class="prop">
                @foreach($properties as $key => $value)
                    <div class="prop__item">
                        <div class="pr_item_item">
                            <span> {{__("mes.".$key)}} </span>
                        </div>
                        <div class="pr_item_item">
                            <span> {{$value}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection





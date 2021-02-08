@extends('layouts.header')

@section('styles')
    <link rel="stylesheet" href="{{ asset("css/buildings/details.css") }}">
@endsection

@section('content')
    @include('templates.contentHeader', ['title' => __("mes.".$building->baseBuilding->category), 'backUrl' => route('buildings')])

    <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-header">
            <div class="uk-card-title">
                {{ __("mes.".$building->baseBuilding->category) }}
            </div>
        </div>
        <div class="uk-text-large">
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
@endsection





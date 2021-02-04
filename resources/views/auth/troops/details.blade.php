@extends('layouts.header')
<title>Тренировать войска</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Войска", 'backUrl' => ''])

    <div class="ui_back">
        <div class="troops_div">
            @foreach($troops as $troop)
                <div class="troop__info">
                    <img src="{{ asset('img/'.$troop->baseTroop->category.$troop->baseTroop->lv.'.png') }}" alt="troop">
                    <div class="troop__details">
                        {{$troop->count}}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

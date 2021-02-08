@extends('layouts.header')
<title>Главная</title>

@section('content')
    @include('templates.contentHeader', ['title' => 'Выбор монстра для атаки', 'backUrl' => route('monsters.search')])

    <div class="uk-card uk-card-default uk-card-body uk-text-large">
        <div>
            Уровень - {{ $monster->lv }}
        </div>
        <div class="uk-margin-bottom">
            Сила - {{ $monster->power }}
        </div>
        <div>
            Награды
            <div class="uk-flex">
                @foreach($monster->reward as $item)
                    <div class="uk-margin-right">
                        <img  src=" {{ asset('img/'.$item->name.$item->quality.'.png') }}" alt="item">
                        <div class="">
                            {{ $item->count }} шт.
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <form action="">
            <input type="hidden" name="id" value="{{ $monster->id }}">
            <button type="submit" class="uk-button uk-button-primary">Выбрать войска</button>
        </form>
    </div>
@endsection

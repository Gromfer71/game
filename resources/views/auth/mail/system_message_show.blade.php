@extends('layouts.header')
<title>Системные сообщения</title>

@section('content')
    @include('templates.contentHeader', ['backUrl' => route('systemMessages'), 'title' => $message->title ])

    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-flex-between">
            <div class="uk-card-title">
                {{ $message->title }}
            </div>
            <div class="uk-align-right">
                {{ $message->created_at}}
            </div>
        </div>
        <div class="uk-card-body uk-text-center">
            {{ $message->message}}
        </div>
        <div class="uk-card-body">
            @if($items)
                @foreach($items as $item)
                    <div class="uk-flex uk-margin uk-child-width-1-3">
                        <div class="">
                            <img src="{{ asset('img/'.$item->name.$item->quality.".png") }}" alt="food_chest">
                        </div>
                        <div>
                            <span class="uk-text-large">{{ __("mes.".$item->name.$item->quality) }}</span>
                        </div>
                        <div class="uk-text-large">
                            {{ $item->count }}
                        </div>
                    </div>
                @endforeach
                    <form action="{{ route('systemMessages.takeItems') }}" method="POST">
                        @csrf
                        <input type="text" name="id" value="{{ $message->id }}" hidden>
                        @if($message->is_items_got)
                            <button  type="submit" class="uk-button uk-button-secondary uk-disabled">Предметы получены</button>
                        @else
                        <button  type="submit" class="uk-button uk-button-primary">Забрать</button>
                        @endif
                    </form>
            @endif
        </div>
    </div>
@endsection

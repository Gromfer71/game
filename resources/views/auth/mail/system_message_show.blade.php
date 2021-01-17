@extends('layouts.header')
<title>Системные сообщения</title>
@section('styles')
@endsection

@section('content')
    <?php
    /** @var \App\Models\SystemMessage $message
     * @var Array $items
     */
    ?>

    @include('templates.contentHeader', ['backUrl' => route('systemMessages'), 'title' => $message->title ])


    <div class="ui_back">
        <hr>
        <div class="system__title">
            <div class="title__title">
                {{ $message->title }}
            </div>
            <div class="title__date">
                {{ $message->created_at}}
            </div>
        </div>
        <hr>
        <img src="{{ asset('img/default_bg.jpg') }}" width="490px" alt="">

        <br><br>
        <div style="text-align: center">
            {{ $message->message}}
        </div>
        <br><br>
        <div class="system_messages__items">
            @if($items)
                @foreach($items as $item)
                    <div class="items__flex">
                        <div class="flex__item">
                            <img src="{{ asset('img/'.$item->name.$item->quality.".png") }}" alt="food_chest">
                            <span class="item__text">
                        {{ __("mes.".$item->name.$item->quality) }}
                    </span>
                        </div>
                        <div class="flex__item">
                     <span class="item__text">
                         {{ $item->count }}
                     </span>
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="center">
            <form action="{{ route('systemMessages.takeItems') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $message->id }}" hidden>
                <button class="btn @if(!$message->is_items_got)  fufei @else grey @endif"
                        @if($message->is_items_got) disabled @endif >
                    Забрать
                </button>
            </form>
            @endif
        </div>


    </div>
@endsection

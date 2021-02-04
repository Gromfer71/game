@extends('layouts.header')
<title>Предметы</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Предметы", 'backUrl' => ''])

        @foreach($items as $item)
            <div class="uk-inline uk-margin-small" uk-toggle="target: #modal{{$item->id}}">
                <img  src=" {{ asset('img/'.$item->baseItem->name.$item->baseItem->quality.'.png') }}" alt="item">
                <div class="uk-overlay uk-padding-remove uk-position-bottom-left uk-text-large uk-light">
                    {{ $item->count }}
                </div>
            </div>
            <div id="modal{{$item->id}}" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <h2 class="uk-modal-title">Использовать предмет</h2>
                    <form action="{{ route('items.use') }}" method="POST">
                        @csrf
                        <label>
                            <input class="uk-range" type='range' id="{{ $item->id }}" name="count" min='0' max='{{ $item->count }}' step='1' value='0'/>
                        </label>
                        <label for="id">
                            <input type="text" id="id" hidden value="{{ $item->id }}" name="id">
                        </label>
                        <div class="range__values">
                            <div class="uk-text-large" id="val{{ $item->id }}">0</div>
                        </div>
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
                        <button class="uk-button uk-button-primary" type="submit">Использовать</button>
                    </form>
                </div>
            </div>
        @endforeach

        <script>
            $(document).ready(function () {
                $('input[type=range]').on('input', function () {
                    $('#val' + $(this).attr('id')).html($(this).val())
                });
            })
        </script>
@endsection

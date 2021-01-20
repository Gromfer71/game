@extends('layouts.header')
<title>Предметы</title>
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/input_range.css') }}">
    <link rel="stylesheet" href="">
@endsection

@section('content')
    @include('templates.contentHeader', ['title' => "Предметы", 'backUrl' => ''])
    <div class="ui_back">
        <div class="items__raw">
            @foreach($items as $item)
                <div class="items__item" id="{{ $item->count }}" data-id="{{ $item->id }}">
                    <img src=" {{ asset('img/'.$item->baseItem->name.$item->baseItem->quality.'.png') }}" alt="item">
                    <div class="item__count">
                        {{ $item->count }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="item__use">
            <img src="{{ asset('img/link_background.png') }}" width="500px" alt="bg">
            <div class="item__form">
                <form action="{{ route('items.use') }}" method="POST">
                    @csrf
                    <label>
                        <input class="range" type='range' name="count" min='0' max='10' step='1' value='0' />
                    </label>
                    <label for="id"></label><input type="text" id="id" hidden value="" name="id">
                    <div class="range__values">
                        <div>0</div>
                        <div id="rangeValue"></div>
                    </div>
                    <button class="btn fufei use_btn">Использовать</button>
                </form>
            </div>

        </div>

    </div>



<script>
    $(document).ready(function() {
        let choose = 0
        let form = $('.item__use')
        $.each($('.items__item'), function(key, item)  {
            $(item).click(function () {
                $('.items__item').css('border', 'none')
                $(item).css('border', "3px solid #fff")
                $('#rangeValue').html(0)
                choose === item && form.slideToggle('display')
                form.css('display') === "none" &&  form.slideToggle('display')
                $('.range').attr({max: item.id, value : 0})
                $('#id').val(item.dataset.id)
                choose = item
            })
        })
       document.querySelector('.range').addEventListener('input', function () {
           $('#rangeValue').html($('.range').val());
       })
    })
</script>
<script src="{{ asset('js/input_range.js') }}"></script>
@endsection

@extends('layouts.header')
<title>Предметы</title>

@section('content')
    @include('templates.contentHeader', ['title' => "Монстры", 'backUrl' => ''])

    @foreach($monsters as $monster)
        <p>{{ $monster->id  }}</p>
        <form action="{{ route('monsters.attack') }}" method="POST">
            @csrf
            <input type="text" hidden name="monsterId" value="{{ $monster->id }}">
            <button type="submit">Аттак</button>
        </form>
        <br><br>
    @endforeach

@endsection

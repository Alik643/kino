@extends('layouts.main')

@section('content')
    <div class="filmglav">
        <div class="film1">
            <h1>{{$year->year}}</h1>
            <div class="filmdescript">
                <div class="filmdestext">
                    <h2>Films</h2>
                    @foreach($year->films as $film)
                        <h3><a href="{{route('films.show', $film->id)}}"><span>{{$film->name}}</span></a></h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

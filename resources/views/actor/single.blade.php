@extends('layouts.main')

@section('content')
    <div class="filmglav">
        <div class="film1">
            <h1>{{$actor->actor}}</h1>
            <div class="filmdescript">
                <div class="filmdesimg">
                    <img src="{{asset('storage/app/public/'.$actor->image)}}" alt="">
                </div>
                <div class="filmdestext">
                    <h2>Films</h2>
                    @foreach($actor->films as $film)
                        <h3><a href="{{route('films.show', $film->id)}}"><span>{{$film->name}}</span></a></h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

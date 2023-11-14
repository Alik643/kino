@extends('layouts.main')

@section('content')

<div class="top">
    <div class="top1">
        <div class="top1_1">
            <h1>Most liked films</h1>
        </div>
    </div>
    <div class="top2">
        <div class="owl-carousel owl-theme top_cont">
            @foreach($likedfilms as $film)
                <div class="top2_1">
                    <img src="{{'storage/app/public/'.$film->image}}" alt="">
                    <a href="{{route('films.show', $film->id)}}"><button class="start-now overflow-hidden"><span>{{$film->name}}</span><i></i></button></a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection


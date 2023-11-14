@extends('layouts.main')

@section('content')
    <div class="catglav">
        <div class="d-flex justify-content-sm-between">
            <div><h1>All films</h1></div>
            <div><h4><a href="{{route('search.index')}}"><i class="fa-solid fa-magnifying-glass"></i></a></h4></div>
        </div>
        <div class="cat">
            <div class="filter">
                <div class="col-sm-6 mb-5">
                    <div class="sort-by-wrapper">
                        <h4>Sort by</h4>
                        <select name="sort" id="sort" class="option">
                            <option value="" disabled selected>choose</option>
                            <option value="sbn">Sort By Newest</option>
                            <option value="sbr">Sort By Rating</option>
                        </select>
                    </div>
                </div>
                <ul class="sidebar-list">
                    <h4>Filter by actors</h4>
                    @foreach($actors as $actor)
                        @if(is_object($actor))
                            <li>
                                <input type="checkbox" class="sort_by_actor_inp"
                                       name="actor[]"
                                       id="actor_check{{$actor->id}}" value="{{$actor->id}}">
                                <label class="sort_by_actor_lab"
                                       for="actor_check{{$actor->id}}">
                                    {{$actor->actor}}
                                </label>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <ul class="sidebar-list">
                    <h4>Filter by rejisors</h4>
                    @foreach($rejisors as $rejisor)
                        @if(is_object($rejisor))
                            <li>
                                <input type="radio" class="sort_by_rejisor_inp"
                                       name="rejisor"
                                       id="actor_check{{$rejisor->id}}" value="{{$rejisor->id}}">
                                <label class="sort_by_rejisor_lab"
                                       for="actor_check{{$rejisor->id}}">
                                    {{$rejisor->name}}
                                </label>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="cat1">
                @foreach($films as $film)
                    <a href="{{route('films.show', $film->id)}}">
                        <div class="cat2" id="">
                            <div class="catimg"><img src="{{'storage/app/public/'.$film->image}}" alt=""></div>
                            <div class="cattext">
                                <h2>{{$film->name}}</h2>
                                <h3>Year: {{$film->year->year}}</h3>
                                <p>Director: {{$film->rejisor->name}}</p>
                                <div class="ratting">
                                    @if($film->rates)
                                        @for($i=0; $i<5; $i++)
                                            @if($film->rates->avg('rate') > $i)
                                                <span><i class="fa-solid fa-star"></i></span>
                                            @else
                                                <span><i style="color: #ccc!important;"
                                                         class="fa-solid fa-star"></i></span>
                                            @endif
                                        @endfor
                                    @endif
                                </div>
                                <form action="{{route('film.like.store', $film->id)}}" method="post">
                                    @csrf
                                    @auth()
                                        <h4 class="d-inline-block">{{$film->liked_users_count}}</h4>
                                        <button type="submit" class="border-0 bg-transparent">
                                            @if(auth()->user()->likedFilms->contains($film->id))
                                                <h4><i class="fa-solid fa-heart"></i></h4>
                                            @else
                                                <h4><i class="fa-regular fa-heart"></i></h4>
                                            @endif
                                        </button>
                                    @endauth
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w-100 d-flex justify-content-center">
        {{ $films->links() }}
    </div>
@endsection

@section('custom_js')
    <script>
        $('input[name="actor[]"], input[name="rejisor"]').change(function () {
            var filter = 1;
            var rejisor = $('input[name="rejisor"]:checked').val();
            var actors = [];
            let valueBy = $('.option').val();

            $('input[name="actor[]"]:checked').each(function () {
                actors.push($(this).val());
            });
            $.ajax({
                url: "{{route('films.index')}}",
                type: "GET",
                data: {
                    valueBy: valueBy,
                    filter: filter,
                    rejisor: rejisor,
                    actors: actors,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    var $response = $(data);
                    var dataToday = $response.find('.cat1');
                    $('.cat1').html(dataToday);
                },
            });
        })
        $('.option').change(function () {
            let valueBy = $(this).val();
            if ($('input[name="actor[]"]:checked').length > 0 ||
                $('input[name="rejisor"]:checked').length > 0) {
                var filter = 1;
                var actors = [];
                var rejisor = $('input[name="rejisor"]:checked').val();

                $('input[name="actor[]"]:checked').each(function () {
                    actors.push($(this).val());
                });
            } else {
                filter = null;
            }
            $.ajax({
                url: "{{route('films.index')}}",
                type: "GET",
                data: {
                    valueBy: valueBy,
                    filter: filter,
                    rejisor: rejisor,
                    actors: actors,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    var $response = $(data);
                    var dataToday = $response.find('.cat1');
                    $('.cat1').html(dataToday);
                },
            });
        })
    </script>
@endsection

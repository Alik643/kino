@extends('layouts.main')

@section('content')
    <div class="filmglav">
        <div class="film1">
            <h1>{{$film->name}}</h1>
            <div class="filmdescript">
                <div class="filmdesimg">
                    <img src="{{asset('storage/app/public/'.$film->image)}}" alt="">
                </div>
                <div class="filmdestext">
                    <h2>Year: <a href="{{route('year.single', $film->year->id)}}"><span>{{$film->year->year}}</span></a></h2>
                    <h2>Rejisor: <a href="{{route('rejisor.single', $film->rejisor->id)}}"><span>{{$film->rejisor->name}}</span></a></h2>
                    <h2>Actors:
                            @foreach($film->actors as $actor)
                            <a href="{{route('actor.single', $actor->id)}}"><span>{{$actor->actor.', '}}</span></a>
                            @endforeach
                        </h2>
                    <h2>Genre:
                            @foreach($film->genres as $genre)
                                <a href="{{route('genre.single', $genre->id)}}"><span>{{$genre->genre.', '}}</span></a>
                            @endforeach
                        </h2>
                    <h2>Description: <span>{!! $film->description !!}</span></h2>
                    <div class="average-rating">
                        <h3>Rating</h3>
                        <h4>{{$avg}} <span style="color: #eeb644"><i class="fa-solid fa-star"></i></span></h4>
                    </div>
                    <form action="{{route('film.like.store', $film->id)}}" method="post">
                        @csrf
                        @auth()
                            <h3 class="d-inline-block">{{$film->liked_users_count}}</h3>
                            <button type="submit" class="border-0 bg-transparent">
                                @if(auth()->user()->likedFilms->contains($film->id))
                                    <h3><i class="fa-solid fa-heart"></i></h3>
                                @else
                                    <h3><i class="fa-regular fa-heart"></i></h3>
                                @endif
                            </button>
                        @endauth
                    </form>
                </div>
            </div>
            <div class="filmvideo">
                <img src="{{asset('public/img/vid.jpg')}}" alt="">
            </div>

            <div class="comment">
                <h1>Comments</h1>
                @auth()
                    <div class="comment_inp">

                            <div class="rating-form-wrapper">
                                <h3>Add your Reviews</h3>
                                <form action="{{route('film.rate.store', $film->id)}}"
                                      method="post">
                                    @csrf
                                    <div class="rating-form row">
                                        <div class="comment-form-rating">
                                            <span>Your rating</span>
                                            <p class="stars">
                                                <label for="rated-1"></label>
                                                <input type="radio" id="rated-1" name="rate"
                                                       value="1">
                                                <label for="rated-2"></label>
                                                <input type="radio" id="rated-2" name="rate"
                                                       value="2">
                                                <label for="rated-3"></label>
                                                <input type="radio" id="rated-3" name="rate"
                                                       value="3">
                                                <label for="rated-4"></label>
                                                <input type="radio" id="rated-4" name="rate"
                                                       value="4">
                                                <label for="rated-5"></label>
                                                <input type="radio" id="rated-5" name="rate"
                                                       value="5" checked="checked">
                                            </p>
                                        </div>
                                        <textarea class="form-control" name="comment" cols="20" rows="5"
                                                  placeholder="Send comment"></textarea>
                                        <button type="submit" class="col-2 mt-2 btn btn-block btn-success">Public</button>
                                    </div>
                                </form>
                            </div>
                            @csrf

                    </div>
                @endauth
                <div class="comment_list w-50 mt-5">
                    @foreach($film->rates as $rate)
                        <div class="rating-item d-flex justify-content-lg-start">
                            <div class="rating-author-pic mr-5">
                                <img
                                    src="{{asset('public/img/userimg.png')}}"
                                    alt="author"/>
                            </div>

                            <div class="rating-author-txt">
                                <div class="rating-star">
                                    @for($i=0; $i<5; $i++)
                                        @if($rate->rate > $i)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i style="color: #ccc!important;"
                                               class="fa fa-star"></i>
                                        @endif
                                    @endfor
                                </div>

                                <div class="rating-meta">
                                    <h3>{{$rate->user->name}}</h3>
                                    <span
                                        class="time">{{$rate->dateAsCarbon->diffForHumans()}}</span>
                                </div>

                                <p>{{$rate->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

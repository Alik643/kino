@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3 font-weight-bolder">{{$film->name}}</h1>
                        <a href="{{route('admin.film.edit', $film->id)}}" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{route('admin.film.delete', $film->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent"><i
                                    class="fa-solid fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.film.index')}}">films</a></li>
                            <li class="breadcrumb-item active">{{$film->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="mb-4">
                        <h1 class="mb-2">Image</h1>
                        <div class="w-100 mb-3">
                            <img src="{{asset('storage/app/public/'.$film->image)}}" alt="image" class="w-50">
                        </div>
                    </div>
                    <div class="mb-4">
                        <h1 class="mb2">Description</h1>
                        {!! $film->description!!}
                    </div>
                    <div class="mb-4 w-100">
                        <h1 class="mb2">Rejisor</h1>
                        <h4 style="color: #2d698c">{{$film->rejisor->name}}</h4>
                    </div>
                    <div class="mb-4 w-100">
                        <h1 class="mb2">Year</h1>
                        <h4 style="color: #2d698c">{{$film->year->year}}</h4>
                    </div>
                    <div class="mb-4 w-100">
                        <h1 class="mb2">Actors</h1>
                        <h4 style="color: #2d698c">
                            @foreach($film->actors as $actor)
                                {{$actor->actor.", "}}
                            @endforeach
                        </h4>
                    </div>
                    <div class="mb-4 w-100">
                        <h1 class="mb2">Genre</h1>
                        <h4 style="color: #2d698c">
                            @foreach($film->genres as $genre)
                                {{$genre->genre.", "}}
                            @endforeach
                        </h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

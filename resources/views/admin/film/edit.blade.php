@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit film</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.film.index')}}">films</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.film.update', $film->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group w-25">
                                <label>Title</label>
                                <input type="text" class="form-control" name="name" placeholder="film name"
                                       value="{{$film->name}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="description">{{$film->description}}</textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add image</label>
                                    <div class="w-50 mb-3">
                                        <img src="{{asset('storage/app/public/'.$film->image)}}" alt="image" class="w-50">
                                    </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" value="{{$film->image}}" name="image">
                                        <label class="custom-file-label">Choose preview</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Select rejisor</label>
                                <select class="form-control" name="rejisor_id">
                                    @foreach($rejisors as $rejisor)
                                        <option value="{{$rejisor['id']}}"
                                            {{$rejisor->id== $film->rejisor_id ? 'selected': ''}}
                                        >{{$rejisor['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Select year</label>
                                <select class="form-control" name="year_id">
                                    @foreach($years as $year)
                                        <option value="{{$year['id']}}"
                                            {{$year->id== $film->year_id ? 'selected': ''}}
                                        >{{$year['year']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Actors</label>
                                <select class="select2" name="actor_ids[]" multiple="multiple" data-placeholder="Select actors" style="width: 100%;">
                                    @foreach($actors as $actor)
                                        <option {{is_array($film->actors->pluck('id')->toArray()) && in_array($actor->id, $film->actors->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$actor->id}}">{{$actor->actor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Genres</label>
                                <select class="select2" name="genre_ids[]" multiple="multiple" data-placeholder="Select genres" style="width: 100%;">
                                    @foreach($genres as $genre)
                                        <option {{is_array($film->genres->pluck('id')->toArray()) && in_array($genre->id, $film->genres->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$actor->id}}">{{$genre->genre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <button type="submit" class="col-3 btn btn-block btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

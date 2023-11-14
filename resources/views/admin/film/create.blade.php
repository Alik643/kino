@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create new film</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.film.index')}}">films</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                        <form action="{{route('admin.film.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <label>Title</label>
                                <input type="text" class="form-control" name="name" placeholder="film name"
                                       value="{{old('name')}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="description">{{old('content')}}</textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Choose image</label>
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
                                        <option value="{{$rejisor->id}}"
                                            {{$rejisor->id== old('rejisor_id') ? 'selected': ''}}
                                        >{{$rejisor->name}}</option>
                                    @endforeach
                                </select>
                                @error('rejisor_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Select year</label>
                                <input name="year" id="year" type="number" min="1800" max="{{ date("Y") }}" value="{{ date("Y") }}">
                                @error('year')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Actors</label>
                                <select class="select2" name="actor_ids[]" multiple="multiple" data-placeholder="Select actors" style="width: 100%;">
                                    @foreach($actors as $actor)
                                        <option {{is_array(old('actor_ids')) && in_array($actor->id, old('actor_ids')) ? 'selected' : ''}} value="{{$actor->id}}">{{$actor->actor}}</option>
                                    @endforeach
                                </select>
                                @error('actor_ids')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select genres</label>
                                <select class="select2" name="genre_ids[]" multiple="multiple" data-placeholder="Select genres" style="width: 100%;">
                                    @foreach($genres as $genre)
                                        <option {{is_array(old('genre_ids')) && in_array($genre->id, old('genre_ids')) ? 'selected' : ''}} value="{{$genre->id}}">{{$genre->genre}}</option>
                                    @endforeach
                                </select>
                                @error('genre_ids')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <button type="submit" class="col-3 btn btn-block btn-success">Add</button>
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

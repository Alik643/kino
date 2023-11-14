@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rejisors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
                            <li class="breadcrumb-item active">Rejisors</li>
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
                    <div class="col-2 mb-3"><a href="{{route('admin.rejisor.create')}}"
                                               class="btn btn-block btn-primary">Add rejisor</a></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th colspan="3" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rejisors as $rejisor)
                                        <tr>
                                            <td>{{$rejisor->id}}</td>
                                            <td>{{$rejisor->name}}</td>
                                            <td><a href="{{route('admin.rejisor.show', $rejisor->id)}}"><i
                                                        class="fa-regular fa-eye"></i></a></td>
                                            <td><a href="{{route('admin.rejisor.edit', $rejisor->id)}}"
                                                   class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.rejisor.delete', $rejisor->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-transparent"><i
                                                            class="fa-solid fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

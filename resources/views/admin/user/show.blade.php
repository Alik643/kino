@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3">{{$user->name}}</h1>
                        <form action="{{route('admin.user.delete', $user->id)}}" method="post">
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
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
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
                    <div class="col-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td><form action="{{route('admin.user.update', $user->id)}}" method="post" class="w-100">
                                                @csrf
                                                @method('patch')
                                                <div class="form-group w-50">
                                                    <select class="form-control" name="role">
                                                        @foreach($roles as $id => $role)
                                                            <option value="{{$id}}"
                                                                {{$id== $user->role ? 'selected': ''}}
                                                            >{{$role}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group w-50">
                                                    <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                </div>
                                                <button type="submit" class="col-4 btn btn-block btn-success">Edit</button>
                                            </form></td>
                                    </tr>
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

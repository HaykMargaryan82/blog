@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.post.index')}}">Post</a></li>
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

                <div class="row ">
                    <div class="col-12 my-3">
                        <a href="{{route('admin.post.create')}}" class="btn btn-danger px-3">Add</a>
                    </div>

                </div>
                <div class="row ">

                    <div class="col-5 mt-4">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>Post name</th>
                                        <th colspan="3">Action</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td><a href="{{route('admin.post.show',$post->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('admin.post.edit',$post->id)}}"><i
                                                        class="fas fa-pen"></i></a></td>
                                            <td>
                                                <form action="{{route('admin.post.delete',$post->id)}}"method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"class="border-0 bg-white" >
                                                        <i class=" text-danger  fas fa-trash"role="button"></i>
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
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

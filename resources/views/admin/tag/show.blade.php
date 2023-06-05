@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex">
                        <div><h1 class="mx-3">{{$tag->title}}</h1></div>
                        <div class="pt-1 d-flex">
                            <a href="{{route('admin.tag.edit',$tag->id)}}"><i class="fas fa-pen"></i></a>
                            <form action="{{route('admin.tag.delete',$tag->id)}}"method="post"class="px-2">
                                @csrf
                                @method('delete')
                                <button type="submit"class="border-0 bg-transparent" >
                                    <i class=" text-danger  fas fa-trash"role="button"></i>
                                </button>

                            </form>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.tag.index')}}">Post</a></li>
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

                    <div class="col-5 mt-4">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>Tag name</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->title}}</td>
                                    </tr>
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

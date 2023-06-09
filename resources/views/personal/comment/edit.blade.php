@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

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
                <div class="col-12"><h4>Edit Comments</h4></div>
                <div class="col-12">
                    <form action="{{route('personal.comment.update',$comment->id)}}"method="post" class="w-50">
                        @csrf
                        @method('Patch')
                        <div class="form-group">
                          <textarea class="form-control" name="message"cols="30"rows="10">{{$comment->message}}</textarea>

                            @error('message')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <input type="submit"class="btn btn-primary px-3"value="Refresh">
                    </form>
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

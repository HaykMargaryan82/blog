@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add user</li>

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

                    <div class="col-12"><h4>Add user</h4></div>
                    <div class="col-12">
                        <form action="{{route('admin.user.store')}}"method="post" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="User name">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Email</label>
                                <input type="text" class="form-control" name="email"  placeholder="Email">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Choose role</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == old('role') ? 'selected': ''}}>
                                            {{$role}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <input type="submit"class="btn btn-primary px-3"value="Add">
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

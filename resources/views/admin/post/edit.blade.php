@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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

                    <div class="col-12"><h4>Edit Post</h4></div>
                    <div class="col-12">
                        <form action="{{route('admin.post.update',$post->id)}}"method="post"enctype="multipart/form-data">
                            @csrf
                            @method('Patch')
                            <div class="form-group w-25">
                                <label>Name</label>
                                <input type="text" class="form-control" name="title" placeholder="Post name" value="{{$post->title}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                @error('content')
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Preview</label>
                                <div class="w-25 mb-2">
                                    <img src="{{url('storage/'. $post->preview_image)}}" alt="preview_image" class="w-50">
                                </div>
                                <div class="input-group">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"name="preview_image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50">
                                <label for="mainInputFile">Add main image</label>
                                <div class="w-50 mb-2">
                                    <img src="{{url('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
                                </div>
                                <div class="input-group">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="mainInputFile"name="main_image">
                                        <label class="custom-file-label" for="mainInputFile">Choose file</label>
                                    </div>

                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50">
                                <label>Choose category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"{{$category->id == $post->category_id ? 'selected': ''}}>
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Tags</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Choose tags" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{is_array($post->tags->pluck('id')->toArray() )&&in_array($tag->id,$post->tags->pluck('id') ->toArray()) ? ' selected ' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary px-3" value="Refresh">
                                <div/>
                            </div>
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

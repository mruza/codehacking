@extends('layouts.admin')

@section('content')
    <h1>Edit post</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo->file}}" alt="" class="img-reponsive">
        </div>
        <div class="col-sm-9">
            <form method="post" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <label name="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">

                <label name="category_id">Category:</label>
                <select class="form-control" name="category_id">
                    <option value="null">Choose</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($post->category_id == $category->id)
                            selected="selected"
                                @endif
                            >{{$category->name}}</option>
                    @endforeach
                </select>

                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile01" name="photo_id">Choose file</label>
                    <input type="file" class="custom-file-input" id="photo_id" name="photo_id">
                </div>

                <label name="body">Body:</label>
                <textarea class="form-control" name="body">{{$post->body}}</textarea>

                <input class="btn btn-primary" type="submit" value="Update post">

            </form>

            <form class="pull-right" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input class="btn btn-danger" type="submit" value="Delete post">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('includes.form_error')
        </div>

    </div>







@endsection
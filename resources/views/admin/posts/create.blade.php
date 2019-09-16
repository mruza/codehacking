@extends('layouts.admin')

@section('content')
    <h1>Create post</h1>

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" files="true">
                {{ csrf_field() }}

                <label name="title">Title:</label>
                <input type="text" class="form-control" name="title">

                <label name="category_id">Category:</label>
                <select class="form-control" name="category_id">
                    <option value="null">Choose</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile01" name="photo_id">Choose file</label>
                    <input type="file" class="custom-file-input" id="photo_id" name="photo_id">
                </div>

                <label name="body">Body:</label>
                <textarea class="form-control" name="body"></textarea>

                <input class="btn btn-primary" type="submit" value="Create post">

            </form>

        </div>
        <div class="col-md-6">
            @include('includes.form_error')
        </div>
    </div>






@endsection
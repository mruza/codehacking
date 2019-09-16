@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        <form method="post" action="{{ route('admin.categories.update', $category->id  ) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <label name="name">Name of category:</label>
            <input type="text" class="form-control" name="name">

            <input class="btn btn-primary" type="submit" value="Update category">
        </form>
    </div>

    <div class="col-sm-6">
        <form class="pull-right" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <input class="btn btn-danger" type="submit" value="Delete post">
        </form>
    </div>


@endsection
@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Owner</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Post link</th>
                    <th>Comments</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/150 '}}"></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, $limit="50", $end = "...")}}</td>
                    <td><a href="{{route('home.post', $post->id)}}">View post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
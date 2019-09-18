@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>
    @if(count($comments) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
                <th>Approve</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">View post</a></td>
                    <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View replies</a></td>
                    <td>
                        @if($comment->is_active == 1)
                            <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="0">
                                <input class="btn btn-success" type="submit" value="Un-approve">
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="1">
                                <input class="btn btn-info" type="submit" value="Approve">
                            </form>

                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No comments</h1>
    @endif

@endsection
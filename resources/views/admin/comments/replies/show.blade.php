@extends('layouts.admin')

@section('content')

    <h1>replies</h1>
    @if(count($replies) > 0)
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
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">View post</a></td>
                    <td>
                        @if($reply->is_active == 1)
                            <form method="POST" action="{{ route('admin.comment.replies.update', $reply->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="0">
                                <input class="btn btn-success" type="submit" value="Un-approve">
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.comment.replies.update', $reply->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="1">
                                <input class="btn btn-info" type="submit" value="Approve">
                            </form>

                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.comment.replies.destroy', $reply->id) }}">
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
        <h1 class="text-center">No replies</h1>
    @endif

@endsection
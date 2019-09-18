@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>




    <hr>
    @if(Auth::check())
    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form" action="{{route('admin.comments.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <textarea class="form-control" rows="3" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endif
    <hr>
@if(count($comments) > 0)
    <!-- Posted Comments -->
    @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}
            <button class="toogle-reply btn btn-primary pull-right">Reply</button>
            @if($comment->replies)
                @foreach($comment->replies as $reply)
                    @if($reply->is_active == 1)
                    <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$reply->body}}
                            </div>

                            <div class="comment-reply-container">

                             <div class="comment-reply col-sm-8" style="display: none">
                                <form role="form" action="{{route('admin.comment.replies.store')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="post_id" value="{{$reply->id}}">
                                        <textarea class="form-control" rows="1" name="body"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Reply</button>
                                </form>
                             </div>
                        </div>
                        <!-- End Nested Comment -->
                 </div>
                    @else
                        <h1 class="text-center">No replies</h1>
                    @endif
            @endforeach
                @endif
        </div>
    </div>
    @endforeach
@endif
@endsection

@section('scripts')

    <script>
        $(" .toogle-reply").click(function () {

            $(this).next().slideToggle("fast");
        })
    </script>

    @endsection
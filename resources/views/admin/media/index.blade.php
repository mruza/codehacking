@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if($photos)
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img src="{{$photo->file}}" height="50"> </td>
            <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
            <td>
                <form class="pull-right" method="POST" action="{{ route('admin.media.destroy', $photo->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </td>
          </tr>
            @endforeach
        @endif
        </tbody>
      </table>

@endsection
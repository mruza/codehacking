@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        <form method="post" action="{{ route('admin.categories.store'  ) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

             <label name="name">Name of category:</label>
             <input type="text" class="form-control" name="name">

             <input class="btn btn-primary" type="submit" value="Create category">
             </form>
    </div>

    <div class="col-sm-6">

        @if($categories)
        <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created_at</th>
              </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
              </tr>
                @endforeach
            </tbody>
          </table>
            @endif
    </div>


@endsection
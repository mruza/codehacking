@extends('layouts.admin')

@section('content')

    <h1>Edit user</h1>

    <div class="row">
    <div class="col-md-3">
        <img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400' }}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-md-9">

    <form method="POST" action="{{ route('admin.users.update', $user->id  ) }}" class="form-group" enctype="multipart/form-data" files="true">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <label name="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}">

        <label name="email">Email:</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}">


        <label for="role_id">Role</label>
        <select class="form-control" name="role_id">
            <option value="null">Choose option</option>
            @foreach($roles as $role)
                <option value="{{ $role->id  }}"
                @if($user->role_id == $role->id)
                    selected="selected"
                @endif
                >{{ $role->name  }}</option>
            @endforeach
        </select>

        <label for="is_active">Status</label>
        <select class="form-control" name="is_active">
            <option value="0"
            @if($user->is_active == 0)
            selected="selected"
            @endif
            >Not active</option>
            <option value="1"
                    @if($user->is_active)
                    selected="selected"
                    @endif
            >Active</option>
        </select>


        <label name="password">Password:</label>
        <input type="password" class="form-control" name="password">

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="photo_id" name="photo_id">
            <label class="custom-file-label" for="inputGroupFile01" name="photo_id">Choose file</label>
        </div>


        <input class="btn btn-primary pull-left" type="submit" value="Update user">
    </form>

            <form class="pull-right" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                    <input class="btn btn-danger" type="submit" value="Delete user">
                </form>


    </div>
    </div>
    <div class="row">
        @include('includes.form_error')
        @endsection

    </div>
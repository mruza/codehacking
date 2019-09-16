@extends('layouts.admin')

@section('content')

    <h1>Create user</h1>
        <form method="post" action="{{ route('admin.users.store'  ) }}" class="form-group" enctype="multipart/form-data" files="true">
            {{ csrf_field() }}

            <label name="name">Name:</label>
            <input type="text" class="form-control" name="name">

            <label name="email">Email:</label>
            <input type="email" class="form-control" name="email">


                <label for="role_id">Role</label>
                <select class="form-control" name="role_id">
                    <option value="null">Choose option</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id  }}">{{ $role->name  }}</option>
                    @endforeach
                </select>



                <label for="is_active">Status</label>
                <select class="form-control" name="is_active">
                    <option value="0">Not active</option>
                    <option value="1">Active</option>
                </select>


            <label name="password">Password:</label>
            <input type="password" class="form-control" name="password">

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo_id" name="photo_id">
                    <label class="custom-file-label" for="inputGroupFile01" name="photo_id">Choose file</label>
                </div>


            <input class="btn btn-primary" type="submit" value="Create user">
            </form>

            @include('includes.form_error')
    @endsection
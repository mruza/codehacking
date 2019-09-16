@if(Session::has('deleted_user'))
    <div class="alert alert-danger" role="alert">
        <strong>Sucess:</strong> {{session('deleted_user')}}
    </div>
@endif
@if(Session::has('created_user'))
    <div class="alert alert-success" role="alert">
        <strong>Sucess:</strong> {{session('created_user')}}
    </div>
@endif
@if(Session::has('updated_user'))
    <div class="alert alert-success" role="alert">
        <strong>Sucess:</strong> {{session('updated_user')}}
    </div>
@endif

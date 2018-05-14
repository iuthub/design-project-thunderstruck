@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
<div class="card-header">Profile</div>

<div class="card-body">
    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
        @CSRF
        <p>
            <h4 class="lead">Name</h4>
            <input required="" class='form-control' type="text" name="name" value="{{ ($obj['name']) }}">
        </p>
        <p>
            <h4 class="lead">Username</h4>
            <input required="" class='form-control' type="text" name="username" value="{{ ($obj['username']) }}">
        </p>
        <p>
            <h4 class="lead">Password</h4>
            <input required="" class='form-control' type="password" name="password">
        </p>
        <p>
            <h4 class="lead">Password Once More</h4>
            <input required="" class='form-control' type="password" name="password2">
        </p>
        <button type="submit" class="form-control btn-primary">Save</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
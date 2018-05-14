@extends('admin.layouts.app')

@section('content')

<div class="offset-md-4 col-md-4 text-center">
		
		@if($errors->has('email') || $errors->has('password'))
		    <p>Some problems with logging in... Check once more login and password</p>
		@endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <p><input class="form-control" placeholder="Username" type="text" name="username" value="{{ old('username') }}" required autofocus></p>
        <p><input class="form-control" placeholder="Password" id="password" type="password" name="password" required></p>
        <p>Remember? <input class="form-control" type="checkbox" name="remember"></p>
        <p><button type="submit" class="btn btn-primary">Login</button></p>
    </form>
</div>
@endsection

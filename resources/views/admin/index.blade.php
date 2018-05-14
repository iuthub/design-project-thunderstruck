@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header navbar-brand">Aurora, the flawless...</div>
                <div class="card-body lead text-center">
                    <p><a href="{{ route("admin-mainpage") }}">Main Page Elements</a></p><hr>
                    <p><a href="{{ route("admin-roomsCategory") }}">Rooms Categories</a></p><hr>
                    <p><a href="{{ route("admin-rooms") }}">Rooms</a></p><hr>
                    <p><a href="{{ route("admin-carousel") }}">Add Images to Main Page Carousel</a></p><hr>
                    <p><a href="{{ route("admin-images") }}">Add Images to Rooms Category</a></p><hr>
                    <p><a>Bookings</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

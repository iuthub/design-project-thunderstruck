@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">

@foreach($categories as $obj)
<div class="card">
  <div class="card-header lead">{{ $obj->type }}</div>
  <div class="card-body">
    @foreach($obj->images as $img)
      <img class="img-thumbnail col-md-4" src="/storage/uploaded_images/gallery/{{$img->image}}">
      <button><a href="{{ route("admin-imageDelete", ["id" => $img->id]) }}">X</a></button>
    @endforeach
    <hr>
      <form method="POST" enctype="multipart/form-data">
        @CSRF
        <input type="hidden" name="room_id" value="{{ $obj->id }}">
        <input class="offset-md-6 col-md-4" required="" class="form-control" type="file" name="img">
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
  </div>
</div>
@endforeach

</div>
</div>
</div>
@endsection

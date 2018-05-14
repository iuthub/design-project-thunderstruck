@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">

<div class="card">
  <div class="card-header lead">Rooms</div>
  <div class="card-body">
    @foreach($rooms as $img)
      <img class="img-thumbnail col-md-4" src="/storage/uploaded_images/carousel/{{$img->image}}">
      <button><a href="{{ route("admin-carouselDelete", ["id" => $img->id]) }}">X</a></button>
    @endforeach
    <hr>
      <form method="POST" enctype="multipart/form-data">
        @CSRF
        <input type="hidden" name="part" value="rooms">
        <input class="offset-md-6 col-md-4" required="" class="form-control" type="file" name="img">
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-header lead">Restaurants</div>
  <div class="card-body">
    @foreach($rests as $img)
      <img class="img-thumbnail col-md-4" src="/storage/uploaded_images/carousel/{{$img->image}}">
      <button><a href="{{ route("admin-carouselDelete", ["id" => $img->id]) }}">X</a></button>
    @endforeach
    <hr>
      <form method="POST" enctype="multipart/form-data">
        @CSRF
        <input type="hidden" name="part" value="rests">
        <input class="offset-md-6 col-md-4" required="" class="form-control" type="file" name="img">
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-header lead">Glass-Igloos</div>
  <div class="card-body">
    @foreach($igloos as $img)
      <img class="img-thumbnail col-md-4" src="/storage/uploaded_images/carousel/{{$img->image}}">
      <button><a href="{{ route("admin-carouselDelete", ["id" => $img->id]) }}">X</a></button>
    @endforeach
    <hr>
      <form method="POST" enctype="multipart/form-data">
        @CSRF
        <input type="hidden" name="part" value="igloos">
        <input class="offset-md-6 col-md-4" required="" class="form-control" type="file" name="img">
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
  </div>
</div>

</div>
</div>
</div>
@endsection

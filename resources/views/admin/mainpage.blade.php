@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
<div class="card-header">Main Page Elements
@if(Session::has('errorImage')))   
<div class="alert alert-danger">
  {{ Session::get('error')}} 
</div>
@endif

</div>
<div class="card-body">
    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
        @CSRF
        <p>
            <h4 class="lead">Main Title of the Landing Page:</h4>
            <input required="" class='form-control' type="text" name="title" value="{{ ($obj['title'])?$obj['title']:'' }}">
        </p>
        <p>
            <h4 class="lead">Main Description:</h4>
            <textarea required="" class='form-control' name="description">{{ ($obj['description'])?$obj['description']:'' }}</textarea>
        </p>
        <p>
            <h4 class="lead">About:</h4>
            <textarea required="" class='form-control' name="about">{{ ($obj['about'])?$obj['about']:'' }}</textarea>
        </p>
        <p>
            <h4 class="lead">Title in the Footer:</h4>
            <input required="" class='form-control' type="text" name="titleDown" value="{{ ($obj['titleDown'])?$obj['titleDown']:'' }}">
        </p>
        <p>
            <h4 class="lead">Studio Name:</h4>
            <input required="" class='form-control' type="text" name="studio" value="{{ ($obj['studio'])?$obj['studio']:'' }}">
        </p>
        <p>
            <h4 class="lead">Rooms Slide Description:</h4>
            <textarea required="" class='form-control' name="roomsDesc">{{ ($obj['roomsDesc'])?$obj['roomsDesc']:'' }}</textarea>
        </p>
        <p>
            <h4 class="lead">Glass Igloo Slide Description:</h4>
            <textarea required="" class='form-control' name="glassDesc">{{ ($obj['glassDesc'])?$obj['glassDesc']:'' }}</textarea>
        </p>
        <p>
            <h4 class="lead">Restaurants Slide Description:</h4>
            <textarea required="" class='form-control' name="restDesc">{{ ($obj['restDesc'])?$obj['restDesc']:'' }}</textarea>
        </p>
        <p>
            <h4 class="lead">Telephone Number #1:</h4>
            <input required="" class='form-control' type="text" name="tel1" value="{{ ($obj['tel1'])?$obj['tel1']:'' }}">
        </p>
        <p>
            <h4 class="lead">Telephone Number #2:</h4>
            <input required="" class='form-control' type="text" name="tel2" value="{{ ($obj['tel2'])?$obj['tel2']:'' }}">
        </p>
        <p>
            <h4 class="lead">Email:</h4>
            <input required="" class='form-control' type="email" name="email" value="{{ ($obj['email'])?$obj['email']:'' }}">
        </p>
        <p>
            <h4 class="lead">Telegram link:</h4>
            <input required="" class='form-control' type="text" name="tgLink" value="{{ ($obj['tgLink'])?$obj['tgLink']:'' }}">
        </p>
        <p>
            <h4 class="lead">Facebook link:</h4>
            <input required="" class='form-control' type="text" name="fbLink" value="{{ ($obj['fbLink'])?$obj['fbLink']:'' }}">
        </p>
        <p>
            <h4 class="lead">Twitter link:</h4>
            <input required="" class='form-control' type="text" name="twLink" value="{{ ($obj['twLink'])?$obj['twLink']:'' }}">
        </p>
        <p>
            <h4 class="lead">Instagram link:</h4>
            <input required="" class='form-control' type="text" name="instaLink" value="{{ ($obj['instaLink'])?$obj['instaLink']:'' }}">
        </p>
        <p>
            <h4 class="lead">Address:</h4>
            <textarea required="" class='form-control' name="address">{{ ($obj['address'])?$obj['address']:'' }}</textarea>
        </p>
        <button type="submit" class="form-control btn-primary">Save</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
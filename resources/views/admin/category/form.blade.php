@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
<div class="card-header">Room categories</div>

<div class="card-body">
    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
        @CSRF
        @if(isset($obj))
        <p>
            <h4 class="lead">Type</h4>
            <input required="" class='form-control' type="text" name="type" value="{{ ($obj['type'])?$obj['type']:'' }}">
        </p>
        <p>
            <h4 class="lead">Short Description of Room Type</h4>
            <textarea required="" class='form-control' name="short_description">{{ ($obj['short_description'])?$obj['short_description']:'' }}</textarea>
        </p>
        <p>
            <h4 class="lead">Full Description of Room Type</h4>
            <textarea required="" class='form-control' name="full_description">{{ ($obj['full_description'])?$obj['full_description']:'' }}</textarea>
        </p>
        @else
        <p>
            <h4 class="lead">Type</h4>
            <input required="" class='form-control' type="text" name="type">
        </p>
        <p>
            <h4 class="lead">Short Description of Room Type</h4>
            <textarea required="" class='form-control' name="short_description"></textarea>
        </p>
        <p>
            <h4 class="lead">Full Description of Room Type</h4>
            <textarea required="" class='form-control' name="full_description"></textarea>
        </p>
        @endif
        <button type="submit" class="form-control btn-primary">Save</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
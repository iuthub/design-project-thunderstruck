@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
<div class="card-header">Room</div>

<div class="card-body">
    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
        @CSRF
        @if(isset($obj))
        <p>
            <h4 class="lead">Number</h4>
            <input required="" class='form-control' type="number" name="num" value="{{ ($obj['num'])?$obj['num']:'' }}">
        </p>
        <p>
            <h4 class="lead">Type</h4>
            <select class="form-control" name="type" required="">
                @foreach($categories as $el)
                    <option {{($el->id==$obj->type)?"selected":""}} value="{{ $el->id }}">{{ $el->type }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <h4 class="lead">Price</h4>
            <input required="" class='form-control' type="text" name="price" value="{{ ($obj['price'])?$obj['price']:'' }}">
        </p>
        <p>
            <h4 class="lead">Number of Places</h4>
            <input required="" class='form-control' type="text" name="places" value="{{ ($obj['places'])?$obj['places']:'' }}">
        </p>
        @else
        <p>
            <h4 class="lead">Number</h4>
            <input required="" class='form-control' type="number" name="num">
        </p>
        <p>
            <h4 class="lead">Type</h4>
            <select class="form-control" name="type" required="">
                @foreach($categories as $el)
                    <option value="{{ $el->id }}">{{ $el->type }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <h4 class="lead">Price</h4>
            <input required="" class='form-control' type="text" name="price">
        </p>
        <p>
            <h4 class="lead">Number of Places</h4>
            <input required="" class='form-control' type="number" name="places">
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
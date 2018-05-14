@extends("layouts.app")

@section("section")

<body id="body" >

@include("layouts.sidenav2")

    <section class="container-fluid">
        <div id="imageCarousel" class="carousel slide" data-ride="true" data-interval="false">
                <div class="carousel-inner" role="listbox">
                    <?php $cnt = 0; ?>
                    @foreach($cat as $c)
                        @foreach($c->images as $i)
                            @if($cnt == 0)
                                <div class="carousel-item active">
                                    <div class="container-fluid">
                                        <div class="row justify-content-center text-center">
                                            <div class="col-10 p-2">
                                                <img class="img-fluid" src="/storage/uploaded_images/carousel/{{$i->image}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-10 p-2">
                                            <img class="img-fluid" src="/storage/uploaded_images/carousel/{{$i->image}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $cnt++; ?>
                        @endforeach
                    @endforeach
                </div>

            <ol class="carousel-indicators">

                <?php $cnt = 0; ?>

                @foreach($cat as $c)
                    @foreach($c->images as $i)
                        @if($cnt == 0)
                            <li class="active" data-slide-to="{{ $cnt }}" data-target="#imageCarousel">
                                <h1></h1>
                                <img class="img-fluid" src="/storage/uploaded_images/carousel/{{$i->image}}">
                            </li>
                        @else
                            <li data-slide-to="{{ $cnt }}" data-target="#imageCarousel">
                                <h1></h1>
                                <img class="img-fluid" src="/storage/uploaded_images/carousel/{{$i->image}}">
                            </li>
                        @endif
                          <?php $cnt++; ?>
                    @endforeach
                @endforeach
            </ol>
{{--             <a class="carousel-control-prev col-2" href="#imageCarousel" role="button" data-slide="prev">
              <i class="fa fa-arrow-left grey" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next col-2" href="#imageCarousel" role="button" data-slide="next">
              <i class="fa fa-arrow-right grey" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a> --}}
            </div>
    </section>

    <section id="image2_back" class="mt-md-5 py-5">
        <div class="container-fluid">
            @foreach($cat as $c)
            <div class="row justify-content-center">
                <div class="headers col-12 mt-5 text-center">
                    <h2 class="display-3">{{ $c->type }}</h1>
                </div>
                <div class="content col-12 col-md-9 px-5">
                    <p class="lead mb-5">
                    {{ $c->full_description }}
                    </p>
                </div><!-- /.content -->
            </div>
            <hr>
            @endforeach
        </div>
    </section>
    
    @include("layouts.foot")

    <div class="overlay"></div>
    @include("layouts.js")
</body>
@endsection
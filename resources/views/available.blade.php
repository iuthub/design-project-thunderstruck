@extends("layouts.app")

@section("section")
<body id="body" >
    
    @include("layouts.sidenav2")

    <header id="header" class="container-fluid my-2 my-sm-3 my-lg-4 px-2 text-center">
        <h2 class="display-4">Available Rooms For You</h2>
    </header>
    <div id="bookCarousel2" class="carousel slide d-flex d-md-none align-content-end" data-ride="carousel" data-interval="false">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center text-center">
                        @foreach($rooms as $r)

                        <div class="col-sm-2">
                            <p>{{ $r->category->type }}</p>
                            @if($r->booked == 0)
                            <button type="button" class="btn btn-primary">
                            Available now
                            </button>
                            @else
                            <button type="button" class="btn btn-primary">
                                Available After {{ $r->bookedTill }}
                            </button>
                            @endif
                        </div>

                        @if($loop->iteration % 2 == 0 && !$loop->last)
                            </div>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <div class="container-fluid">
                            <div class="row d-flex justify-content-center text-center">
                        @endif
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev col-2" href="#bookCarousel2" role="button" data-slide="prev">
			<i class="fa fa-arrow-circle-left"></i>
			<span class="sr-only">Previous</span>
		</a>
        <a class="carousel-control-next col-2" href="#bookCarousel2" role="button" data-slide="next">
			<i class="fa fa-arrow-circle-right"></i>
			<span class="sr-only">Next</span>
		</a>
    </div>
    
    <div id="bookCarousel" class="carousel slide d-none d-md-flex align-content-end" data-ride="carousel" data-interval="false">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center text-center">

                    @foreach($rooms as $r)

                    <div class="col-sm-2">
                        <p>{{ $r->category->type }}</p>
                        @if($r->booked == 0)
                            <button type="button" class="btn btn-primary">
                              Available now
                            </button>
                        @else
                            <button type="button" class="btn btn-primary">
                                Available After {{ $r->bookedTill }}
                            </button>
                        @endif
                    </div>

                    @if($loop->iteration % 5 == 0 && !$loop->last)
                        </div>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <div class="container-fluid">
                        <div class="row d-flex justify-content-center text-center">
                    @endif
                    
                    @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
            <a class="carousel-control-prev col-1" href="#bookCarousel" role="button" data-slide="prev">
                <i class="fa fa-arrow-circle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next col-1" href="#bookCarousel" role="button" data-slide="next">
                <i class="fa fa-arrow-circle-right"></i>
                <span class="sr-only">Next</span>
            </a>
    </div>

    
    @foreach($rooms as $r)
    <article class="container-fluid">
        <hr class="text-muted m-3 m-sm-4 m-lg-5">
        <section class="row justify-content-center">
            <div id="imageLeft" class="image-back-fixed col-10 col-sm-8 col-md-4 d-flex align-items-center">
        <img class="img-fluid" src="/storage/uploaded_images/carousel/{{$r->category->images[0]->image}}">
            </div>
            <div id="textRight" class="col-10 col-sm-8 col-md-4 card-block">
                <div class="card-body">
                    <h1 class="card-title">{{ $r->category->type }}</h1>
                    <p class="card-text">
                        {{ $r->category->short_description }}
                    </p>
                    <a href="{{ route("book", ["id" => $r->id]) }}" type="button" class="btn ">
                        From {{ $r->price }}/Night
                    </a>
                </div>
            </div>
        </section>
    </article>

    @endforeach
    <br>
    <br>
    
    @include("layouts.foot")

    <div class="overlay"></div>
    @include("layouts.js")
</body>
@endsection
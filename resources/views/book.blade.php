@extends("layouts.app")

@section("section")
<body id="body" >
    
    @include("layouts.sidenav2")
    <header id="header" class="">
    </header>
    <!-- **** ARTICLE *** -->
    <article class="container-fluid pt-5">
        <section class="row justify-content-center">
            <div id="anketaBack" class="col-12 col-lg-6 py-lg-0 py-sm-5 pb-5">
                <div id="anketa" class="container">
                    <h1 class="h4 pb-3 text-center">GUEST INFO</h1>
                    <form class="" action="#" method="post" accept-charset="utf-8">
                        @CSRF
                        <div class="form-group row">
                            <label for="firstName" class="col-form-label col-sm-3 m-0">First Name</label>
                            <div class="col-sm-9">
                                <input name="firstName" id="firstName" class="form-control" type="text" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastName" class="col-form-label col-sm-3 m-0">Last Name</label>
                            <div class="col-sm-9">
                                <input name="lastName" id="lastName" class="form-control" type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-form-label col-sm-3 m-0">Email</label>
                            <div class="col-sm-9">
                                <input name="email" id="email" class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z.]{2,6}$" placeholder="aurora@example.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-form-label col-sm-3 m-0">Phone</label>
                            <div class="col-sm-9">
                                <input name="phone" id="phone" class="form-control" type="tel" placeholder="(555)-5555-555">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-form-label col-sm-3 m-0">Address</label>
                            <div class="col-sm-9">
                                <input name="address" id="address" class="form-control" type="text" placeholder="Example Street, 100">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postCode" class="col-form-label col-sm-3 m-0">Postal Code</label>
                            <div class="col-12 col-sm-4">
                                <input name="postal" id="postCode" class="form-control" type="number" pattern="[0-9]{6}" value="" placeholder="6-digit number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-form-label col-sm-3 m-0">City</label>
                            <div class="col-12 col-sm-3">
                                <input name="city" id="city" class="form-control" type="text" placeholder="City">
                            </div>
                            <label for="country" class="col-form-label col-3 col-sm-2 m-0">Country</label>
                            <div class="col-12 col-sm-4">
                                <input name="country" class="form-control" id="country" placeholder="Country">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eta" class="col-form-label col-sm-3 m-0">ETA</label>
                            <div class="col-sm-9">
                                <input name="eta" class="form-control" id="eta" placeholder="08:00">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comment" class="col-form-label col-sm-3 m-0">Comment</label>
                            <div class="col-sm-9">
                                <textarea name="comment" class="form-control" id="comment" rows="2" placeholder="Leave Some Amazing Comment..."></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="room_id" value="{{ $_GET['id'] }}">
                </div>
            </div>
            <div id="roomBack" class="col-10 col-lg-4">
                <div id="room" class="container">
                    <div class="image pb-3">
                        <div>
                            <img src="/images/imageRight.jpg" class="img-fluid">
                        </div>
                    </div>
                    <div class="row ssRow">
                        <div class="col-4 col-sm-4 ssHeadText">Stay</div>
                        <div class="col-8 col-sm-8 ssText">
                            {{ session()->get("arrival") }} - {{ session()->get("departure") }}
                        </div>
                    </div>
                    <div class="row ssRow">
                        @if(session()->get("adults") > 0 )
                        <div class="col-4 col-sm-4 ssHeadText">Adults</div>
                        <div class="col-8 col-sm-8 ssText">{{ session()->get("adults") }}</div>
                        @endif
                    </div>
                    <div class="row ssRow">
                        @if(session()->get("children") > 0 )
                        <div class="col-4 col-sm-4 ssHeadText">Children</div>
                        <div class="col-8 col-sm-8 ssText">{{ session()->get("children") }}</div>
                        @endif
                    </div>
                    <div class="row ssRow">
                        <div class="col-4 col-sm-4 ssHeadText">Room</div>
                        <div class="col-8 col-sm-8 ssText">{{ $room->category->type }}</div>
                    </div>
                    <div class="row ssRow py-3">
                        <div class="col-12 ssText">
                            {{ $room->category->short_description }}
                        </div>
                    </div>
                    <hr>
                    <div class="row ssRow text-center">
                        <div class="col-12 ssPrice">Total {{ $price }} EUR</div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.col-md-5 -->
            <div class="container-fluid pt-3">
                <div class="row justify-content-center">
                    <div class="col-10 d-flex justify-content-end p-0">
                        <button type="submit" class="btn btn-primary col-12 col-lg-3" style="background-color: darkgreen !important">BOOK</button>
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
        </form>
            <!-- /.row -->
        </section>
    </article>
    <br>

    @include("layouts.foot")

    <div class="overlay"></div>
    @include("layouts.js")
</body>
@endsection
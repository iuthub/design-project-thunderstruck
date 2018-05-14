    <footer class="footer m-footer">
        <div id="foot" class="container-fluid mt-0">
            <div class="row justify-content-center">
                <div id="contactUS" class="d-md-none col-12 text-center">
                    <h1 class="weight">CONTACT US</h1>
                </div>
                <div class="contacts col-5 col-sm-6 col-md-3 col-xl-3 pl-md-5 pl-xl-3">
                    <h4 class="weight">ADDRESS</h4>
                    <p class="weight">
                        {{ $attr->address }}
                    </p>
                </div>
                <div class="contacts col-5 col-sm-4 col-md-3 col-xl-2">
                    <h4 class="weight">CONTACTS</h4>
                    
                    <ul class="list-unstyled d-block">
                        <li class="phone1 weight"><i class="fa fa-phone"></i> {{ $attr->tel1 }}</li>
                        <!-- /.phone1 -->
                        <li class="phone2 weight"><i class="fa fa-phone"></i> {{ $attr->tel2 }}</li>
                        <!-- /.phone2 -->
                        <li class="phone3 weight"><i class="fa fa-envelope-o"></i> {{ $attr->email }}</li>
                        <!-- /.phone3 -->
                    </ul>
                </div>
                <div id="links" class=" py-0 col-12 col-md-2 d-flex flex-wrap justify-content-center align-content-center">
                    <a href="{{ $attr->tgLink }}" class="col-2 col-md-6 text-center" title=""><i class="fa fa-paper-plane-o"></i></a>
                    <a href="{{ $attr->fbLink }}" class="col-2 col-md-6 text-center" title=""><i class="fa fa-facebook-square"></i></a>
                    <a href="{{ $attr->twLink }}" class="col-2 col-md-6 text-center" title=""><i class="fa fa-twitter "></i></a>
                    <a href="{{ $attr->instaLink }}" class="col-2 col-md-6 text-center" title=""><i class="fa fa-instagram"></i></a>
                </div>

                <div class="footEnd py-0 px-md-5 px-xl-3 col-10 col-md-12 col-xl-11 text-capitalize d-inline-flex justify-content-between justify-content-xl-between">
                    <div class="left d-flex align-self-end col-7 col-md-6 p-0 text-left text-md-right weight">
                        {{ $attr->titleDown }}
                    </div>
                    <div class="pre p-0 col-3 col-md-5 text-right weight d-md-none">{{ $attr->studio }}
                    </div>
                    <div class="d-none p-0 d-md-flex col-md-5 justify-content-end weight">
                        {{ $attr->studio }}
                    </div>
                </div>
            </div>
        </div>
    </footer>
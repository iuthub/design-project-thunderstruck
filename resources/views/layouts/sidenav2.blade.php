<nav class="navbar sticky-top">
        <div id="content" class="container-fluid align-content-center">
            <button id="openSide" onclick="openNav()" class="blur mx-sm-3 m-sm-1 mr-2"><i class="px-sm-2 fa fa-bars"></i></button>
            <a class="navbar-brand blur" href="#">HOTEL Aurora & Igloos</a>
            <div class="ml-auto d-flex align-items-center">
                <button type="button" class="btn navbar-toggler blur p-0 mx-0 p-sm-2 mx-sm-3" aria-pressed="true" onclick="document.getElementById('id01').style.display='block'">Book</button>
            </div>
        </div>        
    </nav>

    <!-- to close reservation -->
    <div id="id01" class="modal" style="z-index: 1000">
      <!-- Reservation Content -->
      <form class="modal-content animate" method="GET" action="{{ route("available") }}">
        <div class="container mt-3">
            <div class="form-group row">        
                <label for="date" class="col-md-2 col-form-label">Arrival</label>
                <div class="col-md-10">
                <input name="arrival" id="datepicker" value="06/05/2018" class="form-control" style="cursor: pointer;">
                </div>
            </div>     
         <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Departure</label>
                <div class="col-md-10"> 
                <input name="departure" id="datepicker2" value="07/05/2018" class="form-control sm-form-control" style="cursor: pointer; ">
                 </div>
            </div>
            <div class="smCustomcol form-group row">
                <label for=""  class="col-md-2 col-form-label">Adults</label>
                <div class="col-md-10">
                    <input required="" type="number" name="adults" class="form-control sm-form-control">
              </div>
            </div> 
                <div class="smCustomcol form-group row">
                <label for=""  class="col-md-2 col-form-label">Children</label>
                <div class="col-md-10">
                    <input required="" type="number" name="children" class="form-control sm-form-control">
                </div>
            </div>
            <div class="row justify-content-end">
              <input type="submit" value="Search" class="searchBtn m-2 btn">    
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn m-2 mr-3">Cancel</button> 
           </div>
        </div>
      </form>
    </div>


    <!-- *** SIDEBAR *** -->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/">Home</a>
  <a href="/#secondPage">About</a>
  <a href="/#3rdPage">Rooms</a>
  <a href="/#3rdPage/slide2">Restaurants</a>
  <a href="/#3rdPage/slide3">Glass-Igloos</a>
</div>
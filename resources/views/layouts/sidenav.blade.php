	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/">Home</a>
  <a href="/#secondPage">About</a>
  <a href="/#3rdPage">Rooms</a>
  <a href="/#3rdPage/slide2">Restaurants</a>
  <a href="/#3rdPage/slide3">Glass-Igloos</a>
</div>
<!-- sticky topheader  -->
	<header id="headerTop">
			<nav class="navbar-expand-lg sticky-top">
				<button type ="button" id="button">
					<span onclick="openNav()" class="p-3 fa fa-bars"></span>
				</button>	
				<a href="#" class="navbar-brand" id="navbar-brand">Hotel Aurora & Igloos</a>		
				<a href="#" class="btn book " role="button" aria-pressed="true" onclick="document.getElementById('id01').style.display='block'">Booking</a>	
			</nav>
		</header>
<!-- to close reservation -->
<div id="id01" class="modal">

  <!-- Reservation Content -->
  <form class="modal-content animate" method="GET" action="{{ route("available") }}">
    <div class="container mt-3">
    	<div class="form-group row">
    		<label for="date" class="col-sm-2 col-form-label">Arrival</label>
    		<div class="col-sm-10">
    		<input name="arrival" id="datepicker" value="06/05/2018" class="form-control" style="cursor: pointer;">
    		</div>
    	</div>     
     <div class="form-group row">
    		<label for="date" class="col-sm-2 col-form-label">Departure</label>
    		<div class="col-sm-10"> 
      		<input name="departure" id="datepicker2" value="07/05/2018" class="form-control sm-form-control" style="cursor: pointer; ">
     		 </div>
    	</div>
    	<div class="smCustomcol form-group row">
	     	<label for=""  class="col-sm-2 col-form-label">Adults</label>
	     	<div class="col-sm-10">
	     		<input required="" type="number" name="adults" class="form-control sm-form-control">
	      </div>
     	</div> 
			<div class="smCustomcol form-group row">
	     	<label class="col-sm-2 col-form-label">Children</label>
	     	<div class="col-sm-10">
	     		<input required="" type="number" name="children" class="form-control sm-form-control">
		    </div>
     	</div>
     	<div class="row justify-content-end">
	      <input type="submit" value="Search" class=" m-2 btn btn-outline-success">    
	      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn m-2 mr-3">Cancel</button> 
       </div>
    </div>
  </form>
</div>
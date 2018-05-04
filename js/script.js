	var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
	$('#fullpage').fullpage({
	  anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', '5thPage'], menu: '#button',
	  	verticalCentered: false,
	  	// scrollBar:true,
	 onLeave: function(index, nextIndex, direction){
		var leavingSection = $(this);
		if(index == 1 && direction =='down'){
		  $("#headerTop").addClass("header_bg");
		  // $("#headerTop").removeClass("header_bg");
		}
		
		else if( index == 2 && direction == 'up'){
		  $("#headerTop").removeClass("header_bg");
		
		}

    }
	/*	if(index == 1 && direction =='down'){
		  $(".about").addClass("fadeInUp");
		  $(".animate-bottom").addClass("fadeInUp");
		}
		else if(index == 2 && direction =='down'){
		  $(".animate-top").addClass("fadeInUp");
		  $(".animate-bottom").addClass("fadeInUp");
		}
		else if(index == 4 && direction =='down'){
		  $(".contact-block").addClass("bounceIn");
		}
		else if(index == 2 || index == 3 || index == 4 || index == 5 && direction == 'up'){
		  $(".animate-top").removeClass("fadeInUp");
		  $(".animate-bottom").removeClass("fadeInUp");
		  $(".contact-block").removeClass("bounceIn");
	  }*/
	
	});
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,

                    // The latitude and longitude to center the map (always required)
                    // center: new google.maps.LatLng(67.1524741, 26.9195668), // New York
                    center: new google.maps.LatLng(67.1547422, 26.9111954), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},			{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(67.1547422, 26.9122054),
                    map: map,
                });
            }


/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("fullpage").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("fullpage").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}
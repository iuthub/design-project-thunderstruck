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

	
// $(document).ready(function () {

//     $("#sidebar").mCustomScrollbar({
//         theme: "minimal"
//     });

//     // when opening the sidebar
//     $('#sidebarCollapse').on('click', function () {
//         // open sidebar
//         $('#sidebar').addClass('active');
//         // fade in the overlay
//         $('.overlay').fadeIn();
//         $('.collapse.in').toggleClass('in');
//         $('a[aria-expanded=true]').attr('aria-expanded', 'false');
//     });

   
//     // if dismiss or overlay was clicked
//     $('#dismiss, .overlay').on('click', function () {
//       // hide the sidebar
//       $('#sidebar').removeClass('active');
//       // fade out the overlay
//       $('.overlay').fadeOut();
//     });
// });


$(function(){
  $("#openSide").click(function(){
    $("#mySidenav").width(300);
    $('.overlay').fadeIn();
  });
  $("#closeSide, .overlay").click(function(){
    $("#mySidenav").width(0);
    $('.overlay').fadeOut();
    $('#mySidenav .collapse').collapse('hide');
  });
}); 


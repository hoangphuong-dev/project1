$(document).ready(function() {
   $(window).scroll(function(event) {
      var pos_body = $('html,body').scrollTop();
      if(pos_body> 30){
         $('.div_menu').addClass('co_dinh_menu');
      }
      else {
         $('.div_menu').removeClass('co_dinh_menu');
      }
      // if(pos_body>1200){
      //    // $('.back-to-top').addClass('hien-ra');
      // }
      // else{
      //    // $('.back-to-top').removeClass('hien-ra');
      // }
   });
   $('.back-to-top').click(function(event) {
      $('html,body').animate({scrollTop: 0},1400);
   });
});
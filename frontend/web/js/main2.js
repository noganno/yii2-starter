 $(document).ready(function() {
      $(".carousel").owlCarousel({
      navigation : false,
      pagination: false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
      autoPlay : 6000
      });
      $(".carousel_1").owlCarousel({
      navigation : true,
      pagination: false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
      autoPlay : 3000 
      });
      $(".carousel_2").owlCarousel({
      navigation : true,
      pagination: false,
      slideSpeed : 300,
      paginationSpeed : 400,
      items : 3,
      autoPlay : 3000 
      });
       $(".tovar").owlCarousel({
      navigation : true,
      pagination: false,
      slideSpeed : 300,
      paginationSpeed : 400,
      items : 1,
      autoPlay : 3000 
      });
       $("[data-toggle]").click(function() {
          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");
 
        });
         $(".swipe-area").swipe({
              swipeStatus:function(event, phase, direction, distance, duration, fingers)
                  {
                      if (phase=="move" && direction =="right") {
                           $(".mobile").addClass("open-sidebar");
                           return false;
                      }
                      if (phase=="move" && direction =="left") {
                           $(".mobile").removeClass("open-sidebar");
                           return false;
                      }
                  }
          }); 
          $(".swipe-area1").swipe({
              swipeStatus:function(event, phase, direction, distance, duration, fingers)
                  {
                      if (phase=="move" && direction =="right") {
                           $(".mobile1").addClass("open-sidebar");
                           return false;
                      }
                      if (phase=="move" && direction =="left") {
                           $(".mobile1").removeClass("open-sidebar");
                           return false;
                      }
                  }
          }); 

});
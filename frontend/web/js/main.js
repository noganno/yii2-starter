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
      autoPlay : 5000 
      });
      $(".carousel_2").owlCarousel({
      navigation : true,
      pagination: false,
      slideSpeed : 5000,
      paginationSpeed : 400,
      items : 3,
      autoPlay : 5000 
      });
       $(".tovar").owlCarousel({
      navigation : true,
      pagination: false,
      slideSpeed : 300,
      paginationSpeed : 400,
      items : 1,
      autoPlay : 5000 
      });


// sidebars

       $("[data-toggle]").click(function() {

          var toggle_el = $(this).data("toggle");
          $(toggle_el).toggleClass("open-sidebar");

          if ($(this).attr('id') == 'sidebar-toggle1'){

               if ($('#all_content').hasClass('closed')){
                  $('#all_content').css('left', 'auto').animate({'right':'190px'}, 300)
                  $('#all_content').toggleClass("closed opened-right");
                  $('.replace').css({'opacity': 0});
               }else{
                    $('#all_content').animate({'right': 0}, 300);
                               $('#all_content').toggleClass(" opened-right closed ");
                                $('.replace').css({'opacity':1});
               }

          } else if($(this).attr('id') == 'sidebar-toggle'){
              // $('#all_content').toggleClass("closed opened-left", 3000);


               if ($('#all_content').hasClass('closed')){
                  $('#all_content').animate({'left':'270px'}, 300)
                  $('#all_content').toggleClass("closed opened-left");
                   $('.replace1').css({'opacity': 0});
               }else{
                    $('#all_content').animate({'left': 0}, 300);
                     $('.replace1').css({'opacity':1});
                               $('#all_content').toggleClass(" opened-left closed ");
               }

          };
      
 
        });
   

   // sidebar fix
$( window ).resize(function() {
   if ($(window).width() > 990) {
   $('#all_content').css({'left':0,'right':0})
} 
else if( $('.mobile').hasClass('open-sidebar') && $(window).width() < 990)
{
         $('#all_content').css({'left':'270px','right':0});   
}
else if( $('.mobile1').hasClass('open-sidebar') && $(window).width() < 990)
{
         $('#all_content').css({'left':'auto','right':'190px'});   
}

  });

});




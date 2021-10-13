(function($) {
// Test Paragraph


    
    
    
/* First Layer */
   
        
    
        // Change text inside caroucell on scroll 
            // jQuery
            var carousle_front_page_video = document.getElementById("video_cell_0");
            var $previouscell = 0;
            var $carousel = $('#carousel');
            $carousel.on( 'change.flickity', function( event, index ) {
               if(index == 0)
               {
                 carousle_front_page_video.play();
               }else{
                 carousle_front_page_video.pause();
               }
               $($previouscell).find('.carouseltexttransbox').removeClass('carouseltexttransbox').addClass('carouseltexttransboxhidden');
               $($previouscell).find('.carouseltextheader').removeClass('carouseltextheader').addClass('carouseltextheaderhidden');
               $($previouscell).find('.carouseltextbtn').removeClass('carouseltextbtn').addClass('carouseltextbtnhidden');
               //alert($previouscell);
               //$previouscell = '#cell'+index;
               //alert($previouscell);
                let $cellnum = '#cell'+index ;
                $previouscell = $cellnum;
                $($cellnum).find('.carouseltexttransboxhidden').removeClass('carouseltexttransboxhidden').addClass('carouseltexttransbox');
                $($cellnum).find('.carouseltextheaderhidden').removeClass('carouseltextheaderhidden').addClass('carouseltextheader');
                $($cellnum).find('.carouseltextbtnhidden').removeClass('carouseltextbtnhidden').addClass('carouseltextbtn');
              });
              
            $carousel.on( 'ready.flickity', function() 
            {
                let $cellnum = '#cell' + 0 ;
                $previouscell = $cellnum;
                $($cellnum).find('.carouseltexttransboxhidden').removeClass('carouseltexttransboxhidden').addClass('carouseltexttransbox');
                $($cellnum).find('.carouseltextheaderhidden').removeClass('carouseltextheaderhidden').addClass('carouseltextheader');
                $($cellnum).find('.carouseltextbtnhidden').removeClass('carouseltextbtnhidden').addClass('carouseltextbtn');
            });
            
    // Carousel Of first layer Front End
        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            draggable: true,
            // disable previous & next buttons and dots
            prevNextButtons: false,
            pageDots: false,
            // wrapAround
            wrapAround: true,
            // autoplay
            autoPlay: 7000,
            pauseAutoPlayOnHover: false,
            /* caroucel cell speed */
            selectedAttraction: 0.07,
            friction: 1,
            imagesLoaded: true            
        });

    // Navbar 
        //Changing background onscroll
            window.onscroll = function() {scrollFunction()};
                function scrollFunction() {
                    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                        $('#navbarfirst').removeClass("hiddenavbackground").addClass("displaynavbackground");
                        $('#navbarfirst').addClass("shadow-lg");
                    } else {
                        $('#navbarfirst').removeClass("displaynavbackground").addClass("hiddenavbackground");
                        $('#navbarfirst').removeClass("shadow-lg");
                    }
                }
            /* if("http://localhost/pogotemplate/shop.php" == window.location.href) {
                window.onscroll = function() {scrollFunction()};
                function scrollFunction() {
                    if (document.body.scrollTop > 0.01 || document.documentElement.scrollTop > 0.01) {
                        $('#navbarfirst').removeClass("fixed-top-modified").addClass("fixed-top-modified");
                        $('#navbarfirst').addClass("shadow-lg");
                    } else {
                        $('#navbarfirst').removeClass("fixed-top-modified");
                        $('#navbarfirst').removeClass("shadow-lg");
                    }
                }
            } */        
})( jQuery );
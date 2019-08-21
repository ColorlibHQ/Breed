(function ($) {
  'use strict';


  var nav_offset_top = $('header').height() + 50;
  /*-------------------------------------------------------------------------------
    Navbar
  -------------------------------------------------------------------------------*/

  //* Navbar Fixed
  var headerArea = $('.header_area');

  function navbarFixed() {
    if (headerArea.length) {
      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= nav_offset_top) {
          headerArea.addClass('navbar_fixed');
        } else {
          headerArea.removeClass('navbar_fixed');
        }
      });
    }
  }
  navbarFixed();

  // $('select').niceSelect();
  /* ---------------------------------------------
          Isotope js Starts
       --------------------------------------------- */
  var portfolioFilter = $('.portfolio-filter ul li');

  $(window).on('load', function () {
    portfolioFilter.on('click', function () {
      portfolioFilter.removeClass('active');
      $(this).addClass('active');

      var data = $(this).attr('data-filter');
      $workGrid.isotope({
        filter: data
      });
    });

    if (document.getElementById('portfolio')) {
      var $workGrid = $('.portfolio-grid').isotope({
        itemSelector: '.all',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer'
        }
      });
    }
  });

  /*----------------------------------------------------*/
  /* Start Magnific Pop Up
  /*----------------------------------------------------*/
  var imgGal = $('.img-gal');
  if (imgGal.length > 0) {
    imgGal.magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  }
  /*----------------------------------------------------*/
  /*  End  Magnific Pop Up
  /*----------------------------------------------------*/

  /*----------------------------------------------------*/
  /* counter js
  /*----------------------------------------------------*/
  // if(document.getElementById("features_counter")){
  //     $('.counter').counterUp({
  //         delay: 10,
  //         time: 1000
  //     });
  // }

  /*----------------------------------------------------*/
  /*  Testimonials Slider
  /*----------------------------------------------------*/
  var testimonialSlider = $('.testimonial-slider');
  if (testimonialSlider.length) {
    testimonialSlider.owlCarousel({
      loop: false,
      margin: 30,
      items: 1,
      autoplay: false,
      smartSpeed: 2500,
      dots: true
    });
  }

  /*-------------------------------------------------------------------------------
  Brand Slider
  -------------------------------------------------------------------------------*/
  $('.brand-carousel').owlCarousel({
    items: 1,
    autoplay: false,
    loop: true,
    nav: false,
    margin: 30,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      420: {
        items: 1
      },
      480: {
        items: 3
      },
      768: {
        items: 3
      },
      992: {
        items: 5
      }
    }
  });



  /*----------------------------------------------------*/
  /*  Google map js
  /*----------------------------------------------------*/
  //
  // if ($('#mapBox').length) {
  //   var $lat = $('#mapBox').data('lat');
  //   var $lon = $('#mapBox').data('lon');
  //   var $zoom = $('#mapBox').data('zoom');
  //   var $marker = $('#mapBox').data('marker');
  //   var $info = $('#mapBox').data('info');
  //   var $markerLat = $('#mapBox').data('mlat');
  //   var $markerLon = $('#mapBox').data('mlon');
  //   var map = new GMaps({
  //     el: '#mapBox',
  //     lat: $lat,
  //     lng: $lon,
  //     scrollwheel: false,
  //     scaleControl: true,
  //     streetViewControl: false,
  //     panControl: true,
  //     disableDoubleClickZoom: true,
  //     mapTypeControl: false,
  //     zoom: $zoom,
  //     styles: [
  //       {
  //         featureType: 'water',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             color: '#dcdfe6'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'transit',
  //         stylers: [
  //           {
  //             color: '#808080'
  //           },
  //           {
  //             visibility: 'off'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.highway',
  //         elementType: 'geometry.stroke',
  //         stylers: [
  //           {
  //             visibility: 'on'
  //           },
  //           {
  //             color: '#dcdfe6'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.highway',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             color: '#ffffff'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.local',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             visibility: 'on'
  //           },
  //           {
  //             color: '#ffffff'
  //           },
  //           {
  //             weight: 1.8
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.local',
  //         elementType: 'geometry.stroke',
  //         stylers: [
  //           {
  //             color: '#d7d7d7'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'poi',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             visibility: 'on'
  //           },
  //           {
  //             color: '#ebebeb'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'administrative',
  //         elementType: 'geometry',
  //         stylers: [
  //           {
  //             color: '#a7a7a7'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.arterial',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             color: '#ffffff'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.arterial',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             color: '#ffffff'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'landscape',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             visibility: 'on'
  //           },
  //           {
  //             color: '#efefef'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road',
  //         elementType: 'labels.text.fill',
  //         stylers: [
  //           {
  //             color: '#696969'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'administrative',
  //         elementType: 'labels.text.fill',
  //         stylers: [
  //           {
  //             visibility: 'on'
  //           },
  //           {
  //             color: '#737373'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'poi',
  //         elementType: 'labels.icon',
  //         stylers: [
  //           {
  //             visibility: 'off'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'poi',
  //         elementType: 'labels',
  //         stylers: [
  //           {
  //             visibility: 'off'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road.arterial',
  //         elementType: 'geometry.stroke',
  //         stylers: [
  //           {
  //             color: '#d6d6d6'
  //           }
  //         ]
  //       },
  //       {
  //         featureType: 'road',
  //         elementType: 'labels.icon',
  //         stylers: [
  //           {
  //             visibility: 'off'
  //           }
  //         ]
  //       },
  //       {},
  //       {
  //         featureType: 'poi',
  //         elementType: 'geometry.fill',
  //         stylers: [
  //           {
  //             color: '#dadada'
  //           }
  //         ]
  //       }
  //     ]
  //   });
  // }


})(jQuery);
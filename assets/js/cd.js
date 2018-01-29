jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');
  $('#quick_links_wrapper > ul').addClass('list-unstyled');
  $('#industry_list').hide();

  //initialize Masonry plugin
  var $industryMasonry = $('.cd-gallery').masonry({
    itemSelector: '.cd-gallery-item',
    columnWidth: '.cd-gallery-sizer',
    percentPosition: true,
    gutter: 10
  });

  $industryMasonry.imagesLoaded().progress( function() {
    $industryMasonry.masonry('layout');
  });

  var videoHeight = $('.video-header > video').height();
  var contentHeight = $('.container-fluid').height();
  var bodyHeight = $('body').height();
  console.log('videoHeight: ', videoHeight);
  console.log('contentHeight: ', contentHeight);
  console.log('bodyHeight: ', bodyHeight);

  var videoSpace = bodyHeight - contentHeight;
  console.log('available space for video: ', videoSpace);

  var spaceHeightDifference = videoHeight - videoSpace;
  console.log('difference between video height and video space: ', spaceHeightDifference);


  // $('#breadcrumb_toggle').on('click', function() {
  //   if ($('#industry_list').data('expanded') == false) {
  //     $('#industry_list').show();
  //     $('#industry_list').css({
  //       'transform': 'translateY(0px)',
  //       'opacity': '1'
  //     });
  //     $('#industry_list').data('expanded', true);
  //     $({deg: 0}).animate({deg: -180}, {
  //         duration: 300,
  //         step: function(now){
  //             $('#breadcrumb_toggle').css({
  //                  transform: "rotate(" + now + "deg)"
  //             });
  //         }
  //     });
  //
  //   } else if ($('#industry_list').data('expanded') == true) {
  //     $('#industry_list').css('display', 'none');
  //     $('#industry_list').data('expanded', false);
  //     $({deg: 180}).animate({deg: 0}, {
  //         duration: 300,
  //         step: function(now){
  //             $('#breadcrumb_toggle').css({
  //                  transform: "rotate(" + now + "deg)"
  //             });
  //         }
  //     });
  //   }
  //
  // });

// initialize lightbox
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'disableScrolling': true
   });

// initialize flickity
   $('.fl-main-carousel').flickity({
     // options
     cellAlign: 'center',
     contain: true,
     imagesLoaded: true,
     adaptiveHeight: true,
     autoPlay: 5000,
     wrapAround: true
   });


}); //document.ready


 var formWidth = '-320px';

 var searchButton = document.getElementById("searchButton");

 searchButton.addEventListener("mouseover", function(){
   jQuery("#main_menu").css("right", 0);
 });

 searchButton.addEventListener("click", function() {
   jQuery("#main_menu").css("right", formWidth);
 });

window.onscroll = function() {scrollFunction()};

// Minified sticky navbar after scroll past 50px;
function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {

    if (!jQuery("#cd_header").hasClass("cd-mini-nav")) {
      jQuery("#cd_header").addClass("cd-mini-nav");
    }

    if (jQuery("#cd_header").hasClass("navbar-expand-lg")) {
      jQuery("#cd_header").removeClass("navbar-expand-lg");
    }
    if (jQuery("#cd_header").hasClass("navbar-expand-lg")) {
      jQuery("#cd_header").removeClass("navbar-expand-lg");
    }

    jQuery("#main_menu").css("right", 0);

  } else {

    if (jQuery("#cd_header").hasClass("cd-mini-nav")) {
      jQuery("#cd_header").removeClass("cd-mini-nav");
    }

    if (! jQuery("#cd_header").hasClass("navbar-expand-lg")) {
      jQuery("#cd_header").addClass("navbar-expand-lg");
    }

    if (jQuery("#main_menu").hasClass("show")) {
      jQuery("#main_menu").removeClass("show");
    }

    jQuery("#main_menu").css("right", formWidth);

  }
}

function rotateCaret(){

  var elem = jQuery("#learn_more_caret");

  if ( ! jQuery('#learn_more_caret').hasClass('open-caret') ) {

    jQuery({deg: 0}).animate({deg: 90}, {
        duration: 100,
        step: function(now){
            elem.css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });

    jQuery('#learn_more_caret').addClass('open-caret');

  } else {

    jQuery({deg: 90}).animate({deg: 0}, {
        duration: 100,
        step: function(now){
            elem.css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });

    jQuery('#learn_more_caret').removeClass('open-caret');

  }


}

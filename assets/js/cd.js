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

  // $('.carousel').on('slide.bs.carousel', function () {
  //   var height = $('data-height');
  //   console.log(height);
  //   $('.carousel').css('height', height + 'px' );
  // });



  $('#breadcrumb_toggle').on('click', function() {
    if ($('#industry_list').data('expanded') == false) {
      $('#industry_list').show();
      $('#industry_list').css({
        'transform': 'translateY(0px)',
        'opacity': '1'
      });
      $('#industry_list').data('expanded', true);
      $({deg: 0}).animate({deg: -180}, {
          duration: 300,
          step: function(now){
              $('#breadcrumb_toggle').css({
                   transform: "rotate(" + now + "deg)"
              });
          }
      });

    } else if ($('#industry_list').data('expanded') == true) {
      $('#industry_list').css('display', 'none');
      $('#industry_list').data('expanded', false);
      $({deg: 180}).animate({deg: 0}, {
          duration: 300,
          step: function(now){
              $('#breadcrumb_toggle').css({
                   transform: "rotate(" + now + "deg)"
              });
          }
      });
    }

  });

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

// document.getElementById('learn_more_link').on

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


window.onscroll = function() {scrollFunction()};

// Slide down sticky navbar when scrolled past 350px.
function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    if (!jQuery("#cd_header").hasClass("cd-mini-nav")) {
      jQuery("#cd_header").addClass("cd-mini-nav");
    }
    // document.getElementById("cd_logo").style.height = "60px";
    // document.getElementById("cd_toggle").style.fontSize = "1.5rem";
    if (jQuery("#cd_header").hasClass("navbar-expand-md")) {
      jQuery("#cd_header").removeClass("navbar-expand-md");
    }
  } else {
    if (jQuery("#cd_header").hasClass("cd-mini-nav")) {
      jQuery("#cd_header").removeClass("cd-mini-nav");
    }
    if (! jQuery("#cd_header").hasClass("navbar-expand-md")) {
      jQuery("#cd_header").addClass("navbar-expand-md");
    }
  }
}

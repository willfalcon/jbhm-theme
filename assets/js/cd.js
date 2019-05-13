jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');
  $('#quick_links_wrapper > ul').addClass('list-unstyled');
  $('#industry_list').hide();

  // //initialize Masonry plugin
  // var $industryMasonry = $('.cd-gallery').masonry({
  //   itemSelector: '.cd-gallery-item',
  //   columnWidth: '.cd-gallery-sizer',
  //   percentPosition: true,
  //   gutter: 10
  // });

  var video = document.getElementById('home_video');
  if (video) {
    if ( document.documentElement.clientWidth > 900 ) {
      video.src = video.getAttribute('data-srclarge');
    } else {
      video.src = video.getAttribute('data-srcsmall');
    }
    video.onplay = function() {
      window.setTimeout(function() {
        video.loop = false;
      }, 60000);
    };
    video.onended = function() {
      video.src = "";
    }
  }

  // $industryMasonry.imagesLoaded().progress( function() {
  //   $industryMasonry.masonry('layout');
  // });

  var videoHeight = $('.video-header > video').height();
  var contentHeight = $('.container-fluid').height();
  var bodyHeight = $('body').height();
  // console.log('videoHeight: ', videoHeight);
  // console.log('contentHeight: ', contentHeight);
  // console.log('bodyHeight: ', bodyHeight);

  var videoSpace = bodyHeight - contentHeight;
  // console.log('available space for video: ', videoSpace);

  var spaceHeightDifference = videoHeight - videoSpace;
  // console.log('difference between video height and video space: ', spaceHeightDifference);

  if ( spaceHeightDifference > 20 ) {
    $('.video-header').css('min-height', videoHeight + 'px' );
  }


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
  // Project headers
   $('.fl-main-carousel').flickity({
     // options
     cellAlign: 'center',
     contain: true,
     imagesLoaded: true,
     adaptiveHeight: true,
     autoPlay: 5000,
     wrapAround: true
   });

  //Project gallery
  $('.project-carousel').flickity({
    // options
    cellAlign: 'left',
    contain: true,
    wrapAround: true,
    cellAlign: 'left',
    imagesLoaded: true,
    percentPosition: false

  });


  //Highlight search query in search results
  if (document.getElementById('searchQuery')) {
    var searchQuery = document.getElementById('searchQuery').innerHTML;
    var searchTitles = document.querySelectorAll('h3');
    var insertStart = '<span class="accent">';
    var insertEnd = '</span>';

    for (var title of searchTitles) {

      var stringStart = title.innerText.toLowerCase().search(searchQuery);

      if ( stringStart >= 0 ) {
        var start = title.innerText.slice(0, stringStart);
        var insertEndPos = stringStart + searchQuery.length;

        var keep = title.innerText.slice(stringStart, insertEndPos);
        var end = title.innerText.slice(insertEndPos);
        title.innerHTML = start + insertStart + keep + insertEnd + end;
      }

    }

    var searchExcerpts = document.querySelectorAll('.cd-search-result p');

    for (var excerpt of searchExcerpts) {

      var stringStart = excerpt.innerText.toLowerCase().search(searchQuery);

      if ( stringStart >= 0 ) {
        var start = excerpt.innerText.slice(0, stringStart);
        var insertEndPos = stringStart + searchQuery.length;
        var keep = excerpt.innerText.slice(stringStart, insertEndPos);
        var end = excerpt.innerText.slice(insertEndPos);
        excerpt.innerHTML = start + insertStart + keep + insertEnd + end;
      }
    }

  }


}); //document.ready

 //
 // var formWidth = '-320px';
 //
 // var searchButton = document.getElementById("searchButton");
 //
 // searchButton.addEventListener("mouseover", function(){
 //   jQuery("#main_menu").css("right", 0);
 // });
 //
 // searchButton.addEventListener("click", function() {
 //   jQuery("#main_menu").css("right", formWidth);
 // });

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

    // jQuery("#main_menu").css("right", 0);

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

    if(jQuery('#mobile_toggler').hasClass('open')) {
      jQuery('#mobile_toggler').removeClass('open');
    }

    // jQuery("#main_menu").css("right", formWidth);

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

// Select all links with hashes
jQuery('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 500, function() {
          // Callback after animation
          // Must change focus!
          var jQuerytarget = jQuery(target);
          jQuerytarget.focus();
          if (jQuerytarget.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            jQuerytarget.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            jQuerytarget.focus(); // Set focus again
          };
        });
      }
    }
  });

  jQuery('.search-button').click(function(){
    if (jQuery('#main_menu').hasClass('show')) {
      jQuery('#main_menu').removeClass('show');
    }
    if(jQuery('#mobile_toggler').hasClass('open')) {
      jQuery('#mobile_toggler').removeClass('open');
    }
  });

  jQuery('#mobile_toggler').click(function(){
    if (jQuery('#mobile_toggler').hasClass('open')) {
      jQuery('#mobile_toggler').removeClass('open');
    } else {
      jQuery('#mobile_toggler').addClass('open');
    }
  })

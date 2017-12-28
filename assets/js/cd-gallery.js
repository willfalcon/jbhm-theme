jQuery(document).ready(function($) {

  const lg = window.matchMedia( "(min-width: 992px)" );
  const md = window.matchMedia( "(min-width: 768px)" );
  const sm = window.matchMedia( "(min-width: 576px)" );

  if (lg.matches) {
    //do this stuff if screen is 992px or bigger
    // 4 columns here

    $('img.4_col-1').appendTo('#column_1');
    $('img.4_col-2').appendTo('#column_2');
    $('img.4_col-3').appendTo('#column_3');
    $('img.4_col-4').appendTo('#column_4');

  } else if (md.matches) {
    $('img.3_col-1').appendTo('#column_1');
    $('img.3_col-2').appendTo('#column_2');
    $('img.3_col-3').appendTo('#column_3');
    $('#column_4').hide();

  } else {

    $('img.2_col-1').appendTo('#column_1');
    $('img.2_col-2').appendTo('#column_2');
    $('#column_3').hide();
    $('#column_4').hide();

  }


    //
    // if (lg.matches || xl.matches) {
    //   //do this stuff if screen is 992px or bigger
    //   // 4 columns here
    //   $('img.4_col-1').appendTo('#column_1');
    //   $('img.4_col-2').appendTo('#column_2');
    //   $('img.4_col-3').appendTo('#column_3');
    //   $('img.4_col-4').appendTo('#column_4');
    //
    // } else if (md.matches) {
    //   //do this if 768px or bigger
    //   // 3 columns here
    //   $('img.3_col-1').appendTo('#column_1');
    //   $('img.3_col-2').appendTo('#column_2');
    //   $('img.3_col-3').appendTo('#column_3');
    //   $('#column_4').hide();
    //
    // } else if (sm.matches) {
    //   //if 576px or bigger
    //   // 2 columns here
    //   $('img.2_col-1').appendTo('#column_1');
    //   $('img.2_col-2').appendTo('#column_2');
    //   $('#column_3').hide();
    //   $('#column_4').hide();
    // }
  // }

});

if (matchMedia) {

  // const xl = window.matchMedia( "(min-width: 1200px)" );
  // xl.addListener(lgWidthChange);
  // lgWidthChange(xl);

  const lg = window.matchMedia( "(min-width: 992px)" );
  lg.addListener(lgWidthChange);
  lgWidthChange(lg);

  const md = window.matchMedia( "(min-width: 768px)" && "(max-width: 991px)" );
  md.addListener(mdWidthChange);

  if ( mdWidthChange(md) ) {
  } else {
    lgWidthChange(lg);
  }
  const sm = window.matchMedia( "(max-width: 767px)" );
  sm.addListener(smWidthChange);
  smWidthChange(sm);

}

function smWidthChange(sm) {
  if (sm.matches) {
    $('img.2_col-1').appendTo('#column_1');
    $('img.2_col-2').appendTo('#column_2');
    $('#column_3').hide();
    $('#column_4').hide();
  }
}

function mdWidthChange(md) {
  if (md.matches) {
    $('#column_3').show();
    $('img.3_col-1').appendTo('#column_1');
    $('img.3_col-2').appendTo('#column_2');
    $('img.3_col-3').appendTo('#column_3');
    $('#column_4').hide();
    var fired = true;
  } else {
    var fired = false;
  }
  return fired;
}

function lgWidthChange(lg) {
if (lg.matches) {
  //do this stuff if screen is 992px or bigger
  // 4 columns here
  $('#column_3').show();
  $('#column_4').show();
  $('img.4_col-1').appendTo('#column_1');
  $('img.4_col-2').appendTo('#column_2');
  $('img.4_col-3').appendTo('#column_3');
  $('img.4_col-4').appendTo('#column_4');

}
}

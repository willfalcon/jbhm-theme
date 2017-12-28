<?php
//TODO: "cd-gallery" as a selector is gone. Replace "cd-gallery" settings in cd.js and style.css and then change all "cd-gallery" to "cd-gallery".
  $gallery = get_field( 'gallery' );

?>

<?php if ( $gallery ) : ?>

  <div class="cd-gallery">

    <div class="cd-gallery-sizer"></div>

    <?php foreach( $gallery as $image ) : ?>

      <?php

        $width = $image['width'];
        $height = $image['height'];

        $ratio = $width / $height;
        // print_r($image);

        if ( $ratio >= 2 ) {
          $wideImg = true;
          if ( $image['sizes']['thumbnail-width'] > 710 ) {
            $imgSrc = $image['sizes']['thumbnail'];
          } elseif ( $image['sizes']['medium-width'] > 710 ) {
            $imgSrc = $image['sizes']['medium'];
          } elseif ( $image['sizes']['large-width'] > 710 ) {
            $imgSrc = $image['sizes']['large'];
          } else {
            $imgSrc = $image['url'];
          }
        } else {
          $wideImg = false;
          if ( $image['sizes']['thumbnail-width'] > 350 ) {
            $imgSrc = $image['sizes']['thumbnail'];
          } elseif ( $image['sizes']['medium-width'] > 350 ) {
            $imgSrc = $image['sizes']['medium'];
          } elseif ( $image['sizes']['large-width'] > 350 ) {
            $imgSrc = $image['sizes']['large'];
          } else {
            $imgSrc = $image['url'];
          }
        }


      ?>
      <a class="cd-gallery-item" href="<?php echo $image['url']; ?>" data-lightbox="project_gallery_<?php echo $post->ID; ?>">
        <img class="img-fluid gallery-img" src="<?php echo $imgSrc; ?>" alt="<?php echo $image['alt']; ?>"/>
      </a>


    <?php endforeach; ?>

  </div>


<?php endif; ?>

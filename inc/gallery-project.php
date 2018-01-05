<?php
  $gallery = get_field( 'gallery' );

?>

<?php if ( $gallery ) : ?>

  <div class="cd-gallery mt-5">

    <div class="cd-gallery-sizer"></div>

    <?php foreach( $gallery as $image ) : ?>

      <?php

        $width = $image['width'];
        $height = $image['height'];

        $ratio = $width / $height;
        // print_r($image);

        if ( $ratio >= 2 ) {
          $wideImg = true;
          $imgSrc = cd_get_minimum_img_size( $image, 710 );
        } else {
          $wideImg = false;
          $imgSrc = cd_get_minimum_img_size( $image, 350 );
        }


      ?>
      <a class="cd-gallery-item" href="<?php echo $image['url']; ?>" data-lightbox="project_gallery_<?php echo $post->ID; ?>">
        <img class="img-fluid gallery-img" src="<?php echo $imgSrc; ?>" alt="<?php echo $image['alt']; ?>"/>
      </a>


    <?php endforeach; ?>

  </div>


<?php endif; ?>

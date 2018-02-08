<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 18
  );
  $query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) : ?>

  <div <?php post_class(); ?>>


    <div class="row">
      <div class="col">
        <h2 class="project-title accent py-3 m-0 text-center">News</h2>
      </div>
    </div>


    <div class="row news-archive">

      <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <div class="col-12 cd-blog-card">

        <?php
          $featured_img = false;
          if ( get_field( 'header_img' ) ) {
            $featured_img = get_field( 'header_img' );
          } elseif ( get_field( 'images' ) ) {
            $images = get_field( 'images' );
            $featured_img = $images[0];
          }

        ?>

          <div class="cd-blog-desc">

            <div class="cd-blog-tails">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <hr class="accent">
              <p><?php the_time( 'n.j.y'); ?></p>
            </div>
<?php /*
            <div class="text-right">
              <a href="<?php the_permalink(); ?>" class="cd-more">
                More <i class="fa fa-caret-right accent"></i>
              </a>
            </div>
*/ ?>
          </div>

            <?php if ( $featured_img ) : ?>
              <a href="<?php the_permalink(); ?>">
                <img class="blog-thumbnail-img" src="<?php echo $featured_img['sizes']['thumbnail']; ?>" alt="<?php echo $featured_img['alt']; ?>"/>
              </a>
            <?php endif; ?>


      </div>

    <?php endwhile; ?>
  </div>

</div>

<?php else: ?>

  <h3 class="mb-4">Sorry, nothing here!</h3>

<?php endif; ?>


<?php get_footer(); ?>

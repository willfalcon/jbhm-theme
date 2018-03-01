<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'paged' => $paged
  );
  $query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) : ?>

  <main <?php post_class(); ?>>


    <div class="row">
      <div class="col">
        <h2 class="project-title accent py-3 m-0 text-center">News</h2>
      </div>
    </div>


    <div class="row news-archive">
      <main class="col-12 col-md-9">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

        <article class="cd-blog-card">

          <?php
            $featured_img = false;
            if ( get_field( 'header_img' ) ) {
              $featured_img = get_field( 'header_img' );
            } elseif ( get_field( 'images' ) ) {
              $images = get_field( 'images' );
              $featured_img = $images[0];
            }

          ?>

          <?php if ( $featured_img ) : ?>
            <a class="blog-thumbnail-wrap" href="<?php the_permalink(); ?>">
              <img class="blog-thumbnail-img" src="<?php echo $featured_img['sizes']['thumbnail']; ?>" alt="<?php echo $featured_img['alt']; ?>"/>
            </a>
          <?php endif; ?>

          <div class="cd-blog-desc">

            <div class="cd-blog-tails">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="text-uppercase"><?php the_time( 'j F Y'); ?></p>
            </div>
          </div>



        </article>

      <?php endwhile; wp_reset_postdata(); ?>
    </main>
    <aside class="col-12 col-md-3 project-sidebar">
      <div class="page-sidebar-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h5 class="text-center text-md-left">Feature</h5>
          <?php the_content(); ?>
          <hr class="accent">
        <?php endwhile; endif;?>

        <?php if ( have_rows( 'books', 'option' ) ) : while ( have_rows( 'books', 'option' ) ) : the_row(); ?>

          <?php $img = get_sub_field( 'thumbnail' ); ?>
          <div class="design-book clearfix my-3">

            <a href="<?php the_sub_field( 'link' ); ?>" target="_blank">
              <img class="img-fluid w-50 float-left pr-2" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" />
            </a>
            <a href="<?php the_sub_field( 'link' ); ?>" target="_blank"><?php the_sub_field( 'title' ); ?></a>

          </div>

        <?php endwhile; ?>
        <hr class="accent">

        <?php endif; ?>

        <h5 class="text-center text-md-left">News Archives</h5>
        <?php
          $args = array(
            'limit' => 12
          );
          wp_get_archives( $args );
        ?>

      </div>
      <div class="text-center mt-3">

        <?php if ( get_field( 'facebook_url', 'option' ) ) : ?>

          <a class="social-link mx-2" href="<?php the_field( 'facebook_url', 'option' ); ?>" target="_blank">
            <i class="fa fa-2x fa-facebook"></i>
          </a>

        <?php endif; ?>

        <?php if ( get_field( 'twitter_url', 'option' ) ) : ?>

          <a class="social-link mx-2" href="<?php the_field( 'twitter_url', 'option' ); ?>" target="_blank">
            <i class="fa fa-2x fa-twitter"></i>
          </a>

        <?php endif; ?>

        <?php if ( get_field( 'instagram_url', 'option' ) ) : ?>

          <a class="social-link mx-2" href="<?php the_field( 'instagram_url', 'option' ); ?>" target="_blank">
            <i class="fa fa-2x fa-instagram"></i>
          </a>

        <?php endif; ?>

        <?php if ( get_field( 'linkedin_url', 'option' ) ) : ?>

          <a class="social-link mx-2" href="<?php the_field( 'linkedin_url', 'option' ); ?>" target="_blank">
            <i class="fa fa-2x fa-linkedin"></i>
          </a>

        <?php endif; ?>

      </div>
    </aside>
  </div>


  <div class="cd-blog-nav project-content-wrap mt-5 mb-4">

    <p class="blog-nav-link">
        <?php previous_posts_link( '<i class="fa fa-caret-left accent"></i> Newer Posts' ); ?>

    </p>
    <p class="blog-nav-link right">

        <?php next_posts_link( 'Older Posts <i class="fa fa-caret-right accent"></i>', $query->max_num_pages ); ?>

    </p>

  </div>


</main>

<?php else: ?>

  <h3 class="mb-4">Sorry, nothing here!</h3>

<?php endif; ?>


<?php get_footer(); ?>

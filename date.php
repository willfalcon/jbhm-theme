<?php

    get_header();


  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'paged' => $paged
  );
  $query = new WP_Query( $args );
?>

<?php if ( have_posts() ) : ?>

  <main <?php post_class(); ?>>


    <div class="row">
      <div class="col">
        <a href="<?php echo home_url(); ?>/news"><h2 class="project-title accent py-3 m-0 text-center">News</h2></a>
      </div>
    </div>


    <div class="row news-archive">
      <main class="col-12 col-md-9">
        <?php while ( have_posts() ) : the_post(); ?>

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

            <div class="order-md-2 cd-blog-desc">

              <div class="cd-blog-tails">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="text-uppercase"><?php the_time( 'j F Y'); ?></p>
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
                <a class="order-md-1" href="<?php the_permalink(); ?>">
                  <img class="blog-thumbnail-img" src="<?php echo $featured_img['sizes']['thumbnail']; ?>" alt="<?php echo $featured_img['alt']; ?>"/>
                </a>
              <?php endif; ?>


        </article>

      <?php endwhile; ?>
    </main>
    <aside class="col-12 col-md-3 project-sidebar sticky-sidebar">
      <div class="page-sidebar-content">
        <h5>News Archives</h5>
        <?php
          $args = array(
            'limit' => 12
          );
          wp_get_archives( $args );
        ?>
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

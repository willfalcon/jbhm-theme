<?php

  get_header();

  if ( have_posts() ) :

    $count = 0;

    if ( ! get_field( 'no_slider' ) ) {
      $images = get_field( 'images' );
      $featured_img = $images[0];

      if ( $images ) {
        foreach ( $images as $image ) {
          $count++;
        }
      }
    }

  ?>

  <?php if ( $count > 1 ) : ?>

    <div id="post-<?php echo $post->ID; ?>-carousel" class="news-carousel carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">

        <?php $i = 0; foreach ( $images as $image ) : ?>
          <li data-target="#post-<?php echo $post->ID; ?>-carousel" data-slide-to="<?php echo $i; ?>"<?php if ($i==0): ?> class="active"><?php endif; ?></li>
        <?php $i++; endforeach; ?>

      </ol>

      <div class="carousel-inner">

        <?php $i=0; foreach ( $images as $image ) : ?>

        <div class="carousel-item<?php if ($i==0): ?> active<?php endif; ?>">
          <img class="d-block w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>

        <?php $i++; endforeach; ?>

      </div>

    <a class="carousel-control-prev" href="#post-<?php echo $post->ID; ?>-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#post-<?php echo $post->ID; ?>-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


<?php elseif ( $count == 1) : ?>

  <div class="row">
    <img class="d-block w-100 img-fluid" src="<?php echo $featured_img['sizes']['large']; ?>" alt="<?php echo $featured_img['alt']; ?>">
  </div>

<?php endif; ?>
  <div <?php post_class(); ?>>
    <div class="row">
      <div class="cd-blog-post-wrap">

        <?php while ( have_posts() ) : the_post(); ?>

          <h3>News</h3>

          <?php the_title( '<h2 class="accent">', '</h2>' ); ?>

          <div class="cd-blog-post-tails">
            <p class="text-uppercase"><?php the_time( 'j F Y' ); ?></p>
            <p><?php the_author(); ?></p>
            <hr class="accent">
          </div>

          <?php the_content() ?>

          <div class="cd-blog-nav">
            <?php previous_post_link( '<p class="blog-nav-link">%link</p>','<i class="fa fa-caret-left accent"></i> Previous Story' ); ?>
            <?php next_post_link( '<p class="blog-nav-link right">%link</p>', 'Next Story <i class="fa fa-caret-right accent"></i>' ); ?>
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  </div>

<?php else: ?>

  <h3 class="mb-4">Sorry, nothing here!</h3>

<?php endif; ?>

<?php get_footer(); ?>

<?php
  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }
?>

<div class="row mt-2">
  <div class="page-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_title( '<h2 class="accent my-4">', '</h2>' ); ?>

    <?php the_content() ?>

    <?php endwhile; else: ?>

      <h3 class="mb-4 page-error">Sorry, nothing here!</h3>

    <?php endif; wp_reset_postdata(); ?>

    <?php

      $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1
      );
      $query = new WP_Query($args);

      while ( $query->have_posts() ) : $query->the_post();

        if ( have_rows( 'recognition' ) ) : ?>

        <div>

          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

          <ul>

            <?php while ( have_rows( 'recognition' ) ) : the_row( 'recognition' ); ?>
              <li><?php the_sub_field( 'name' ); ?></li>
            <?php endwhile; ?>

          </ul>

        </div>

      <?php endif;

      endwhile;

     ?>
   </ul>
  </div>
</div>

<?php get_footer(); ?>

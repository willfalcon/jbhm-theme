<?php

  $args = array(
    'post_type' => 'project',
    'posts_per_page' => -1
  );
  $query = new WP_Query($args);

  while ( $query->have_posts() ) : $query->the_post();

    if ( have_rows( 'recognition' ) ) : ?>

    <div>

      <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>

      <ul>

        <?php while ( have_rows( 'recognition' ) ) : the_row( 'recognition' ); ?>
          <li><?php the_sub_field( 'name' ); ?></li>
        <?php endwhile; ?>

      </ul>

    </div>

  <?php endif;

  endwhile;

 ?>

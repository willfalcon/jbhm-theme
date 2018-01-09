<?php

  get_header();

  $all = true;
  $team = false;
  $principals = false;

  if ( isset( $_GET['p'] ) ) {
      switch ( $_GET['p'] ) {
        case 'All':
          break;
        case 'Team':
          $filter = 'team';
          $all = false;
          $team = true;
          break;
        case 'Principals':
          $filter = 'principals';
          $all = false;
          $principals = true;
          break;
      }
  }

  if ( ! empty( $filter ) ) {

    $query = new WP_Query( array(
      'post_type' => 'person',
      'posts_per_page' => -1,
      'category_name' => $filter,
      'meta_key' => 'order',
      'orderby' => 'meta_value_num',
      'order' => 'ASC'
    ));

  } else {

    $query = new WP_Query( array(
      'post_type' => 'person',
      'posts_per_page' => -1,
      'meta_key' => 'order',
      'orderby' => 'meta_value_num',
      'order' => 'ASC'
    ));
  }

?>

<div class="row">
  <div class="page-content">
    <div class="d-flex flex-wrap align-items-center my-3">

      <h2 class="accent mb-0">People</h2>

      <div>
        <a class="btn people-filter-btn<?php if ($all) : ?> active-filter<?php endif; ?>" href="?p=All" id="filter_all">All</a>
        <a class="btn people-filter-btn<?php if ($principals) : ?> active-filter<?php endif; ?>" href="?p=Principals" id="filter_principals">Principals</a>
        <a class="btn people-filter-btn<?php if ($team) : ?> active-filter<?php endif; ?>" href="?p=Team" id="filter_team">Team</a>
      </div>

    </div>
  </div>
</div>


<div class="row cd-people-grid">

  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php $headshot = get_field( 'headshot' ); ?>

    <a class="cd-grid-item col-12 col-sm-6 col-md-4 col-xl-3" href="<?php the_permalink(); ?>">

      <div class="img">
        <img class="img-fluid" src="<?php echo $headshot['sizes']['thumbnail']; ?>" alt="<?php echo $headshot['alt']; ?>"/>
      </div>

      <div class="cd-grid-content-person h-size-adjust">
        <h3><?php the_title(); ?></h3>
        <hr class="accent">
        <h4><?php the_field( 'position' ); ?></h4>
      </div>

    </a>

  <?php endwhile; endif;  wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>

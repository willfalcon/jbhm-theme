<?php

get_header();

global $query_string;

 wp_parse_str( $query_string, $search_query );


$search = new WP_Query( $search_query );

?>

<div class="cd-search-results">

  <?php if ( have_posts() ) : ?>

    <h2 class="mt-3 accent">Search results for "<?php echo $search_query['s']; ?>"</h2>

    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Search.php -->
    <div class="cd-search-result">
      <a href="<?php the_permalink(); ?>"><?php the_title('<h3>', '</h3>'); ?></a>
      <?php the_excerpt(); ?>
      <div class="text-right">
        <a href="<?php the_permalink(); ?>">Go <i class="fa fa-caret-right"></i></a>
      </div>
    </div>

  <?php endwhile; else: ?>

    <h2 class="mt-3 accent">No search results for "<?php echo $search_query['s']; ?>"</h2>

  <?php endif; ?>

</div>

<?php get_footer(); ?>

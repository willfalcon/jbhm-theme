<?php
  /*
    Single Post Type breadcrumbs
  */

  $queriedObject = get_queried_object();

  $post_type = $queriedObject->post_type;
  $noTax = false;

  if ( isset( $_GET['t'] ) && $_GET['t'] == 's' ) {
    $tax = 'services';
  } else {
    $tax = 'industries';
  }

?>


<nav class="cd-breadcrumb" id="single-post-type-breadcrumbs" aria-label="breadcrumb" role="navigation">

  <div class="cd-breadcrumb-top">

    <ol class="breadcrumb">

      <?php if ( $post_type == 'project' ) : ?>
        <?php // If this is a Single Project page, there's some stuff we'll need to check,
              // and it might get kinda complicated, so we'll do that in here. ?>
        <?php get_template_part( 'inc/breadcrumbs/single-project' ); ?>

      <?php elseif ( $post_type == 'post' ) : ?>
        <?php // If this is a Single Post page (News Post, in our case), link back to the Blog/News page. ?>
        <li class="breadcrumb-item"><a href="<?php bloginfo('url'); ?>/news">News</a></li>
        <?php $noTax = true; ?>

      <?php elseif ( $post_type == 'person' ) : ?>
        <?php // If this is a Single Person page, link back to the Person Archive page. ?>
        <li class="breadcrumb-item"><a href="<?php bloginfo('url'); ?>/people">People</a></li>
        <?php $noTax = true; ?>

        <?php
          // That should be all our Single Post Types, but if more end up being added,
          // you can add them here in the same format as the ones above.
          // Set $noTax to true if you don't want the Services or Industry drop-down for the post-type.
        ?>

      <?php endif; ?>

      <?php // Output the title of the Single Post we're on, without a link. ?>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo $queriedObject->post_title; ?>
      </li>

    </ol>

    <?php
      if ( is_ie() && get_browser_version() < 10.0 ) {
        $noTax = true;
      }
    ?>

    <?php if ( ! $noTax ) : ?>
      <img class="d-none d-md-block" id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>
    <?php endif; ?>

  </div>

  <?php if ( ! $noTax ) : ?>
    <ul id="industry_list" class="list-unstyled breadcrumb-industry-list" data-expanded="false">

      <?php
        $taxterms = get_terms(
          array(
            'taxonomy' => $tax,
            'hide_empty' => false,
          )
        );
      ?>

      <?php foreach ( $taxterms as $term ) : ?>
          <li><a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
      <?php endforeach; ?>

    </ul>
  <?php endif; ?>

</nav>

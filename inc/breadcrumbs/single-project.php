<?php
  $term = get_terms(
    array(
      'taxonomy' => 'industries'
    )
  );

  if ( isset( $_GET['t'] ) && $_GET['t'] == 's' ) {
    $tax = 'services';
  } else {
    $tax = 'industries';
  }

  if ( isset( $_GET['o'] ) ) {
    $termID = intval( $_GET['o'] );
    $term = get_term_by( 'id', $termID, $tax );
  }

?>

<?php // Definitely output "Projects /" first.
      // This provides a place to go back to for people who were sent
      // from the Front Page or from an external link. ?>
<li class="breadcrumb-item">
  <a href="<?php bloginfo('url'); ?>/projects">Projects</a>
</li>

<?php // If we were sent here from a Services or Industries Taxonomy Page,
      //which we know by the presence of a query string, output that Taxonomy next. ?>
<?php if ( isset( $_GET['t'] ) ) : ?>
  <?php if ( $tax == 'services' ) : ?>
    <li class="breadcrumb-item">
      <a href="<?php bloginfo('url'); ?>/services">Services</a>
    </li>
  <?php else: ?>
    <li class="breadcrumb-item">
      <a href="<?php bloginfo('url'); ?>/projects">Industries</a>
    </li>
  <?php endif; ?>


  <?php // If we were sent here from a Services or Industries Tax Page,
        // we should have gotten a Term ID as a query string as well.
        // Output that if we got it, but don't if not for some reason. ?>
  <?php if ( isset( $_GET['o'] ) ) : ?>
    <li class="breadcrumb-item">
       <a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><?php echo $term->name; ?></a>
    </li>
  <?php endif; ?>

<?php endif; ?>

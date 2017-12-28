<?php
  /*
    Taxonomy Archive page breadcrumbs
  */

  $queriedObject = get_queried_object();

  $taxonomy = $queriedObject->taxonomy;
  $taxObject = get_taxonomy( $taxonomy );
  $display_tax = $taxObject->label;
  $display_term = $queriedObject->name;

?>

<nav class="cd-breadcrumb" id="taxonomy-term-breadcrumbs" aria-label="breadcrumb" role="navigation">

  <div class="cd-breadcrumb-top">

    <ol class="breadcrumb">

      <?php // Since the Projects page actually gives you a list of Industries,
            // which lands us here, a list of projects within that industry,
            // show a "Projects" breadcrumb, then the Taxonomy,
            // to help make sense of the way we've structured the site. ?>
      <?php if ( $taxonomy == 'industries' ) : ?>
        <li class="breadcrumb-item">
          <a href="<?php bloginfo( 'url' ); ?>/projects">
            Projects
          </a>
        </li>
      <?php endif; ?>

      <?php // Output and link back to the current Taxonomy.
            // e.g. "Industries" (Projects page) or "Services". ?>
      <li class="breadcrumb-item" id="taxonomy-breadcrumb">
        <a href="<?php bloginfo( 'url' ); ?>/<?php if ( $taxonomy == 'industries' ) : ?>projects<?php else: echo $taxObject->name; endif;?>">
          <?php echo $display_tax; ?>
        </a>
      </li>

      <?php // Output the current Taxonomy Term.
            // e.g. "Architecture" if we're in Services, or "Aviation" if we're in Industries. ?>
      <li class="breadcrumb-item active" id="taxonomy-term-breadcrumb" aria-current="page">
        <?php echo $display_term; ?>
      </li>

    </ol>

    <img id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

  </div>


  <ul id="industry_list" class="list-unstyled breadcrumb-industry-list" data-expanded="false">
    <?php
       $industries = get_terms(
         array(
           'taxonomy' => 'industries',
           'hide_empty' => false,
         )
       );
     ?>
     <?php foreach ( $industries as $industry ) : ?>
         <li><a href="<?php echo get_term_link( $industry->term_id, $industry->taxonomy ); ?>"><?php echo $industry->name; ?></a></li>
     <?php endforeach; ?>
 </ul>
</nav>

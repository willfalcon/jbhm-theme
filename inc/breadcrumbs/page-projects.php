<?php
  /*
    Projects Page breadcrumbs
  */
?>

<nav class="cd-breadcrumb" id="page-projects-breadcrumbs" aria-label="breadcrumb" role="navigation">

  <div class="cd-breadcrumb-top">

    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Industries</li>
    </ol>

    <img class="d-none d-md-block" id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

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

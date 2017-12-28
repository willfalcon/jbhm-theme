<?php
  /*
    Default Page breadcrumbs
  */

  $queriedObject = get_queried_object();

?>

<nav class="cd-breadcrumb" aria-label="breadcrumb" id="page-breadcrumbs" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>
  </ol>
</nav>

<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div <?php post_class(); ?>>
    <div class="row">


      <div class="col-12 col-md-6 col-xl-4 order-md-2">

        <?php if ( get_field( 'headshot' ) ) : ?>
          <?php $headshot = get_field( 'headshot' ); ?>
          <img class="img-fluid" src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>"/>
        <?php endif; ?>

        <div class="light-font d-none d-md-block">

          <?php if ( get_field( 'office_select' ) ) : ?>
            <?php $office = get_field( 'office_select' );?>
            <a class="d-block" href="<?php echo home_url(); ?>/contact-us#office_<?php echo $office['value']; ?>">
              <strong>Office: </strong><?php echo $office['label']; ?></p>
            </a>
          <?php endif; ?>

          <?php if ( get_field( 'email' ) ) : ?>
            <a class="d-block" href="mailto:<?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a>
          <?php endif; ?>

          <?php if ( get_field( 'phone' ) ) : ?>
            <a class="d-block" href="tel:<?php the_field( 'phone', false, false ); ?>"><?php the_field( 'phone' ); ?></a>
          <?php endif; ?>

          <hr class="accent">

        </div>


      </div>

      <div class="col-12 col-md-6 col-xl-8 order-md-1">

        <h2 class="mb-1">
          <?php
            if ( get_field( 'long_name' ) ) {
              the_field( 'long_name' );
            } else {
              the_title();
            }
          ?>
        </h2>
        <?php if ( get_field( 'position' ) ) : ?>
          <h3 class="accent"><?php the_field( 'position' ); ?></h3>
        <?php endif; ?>

        <?php if ( get_field( 'bio' ) ) : ?>
          <?php the_field( 'bio' ); ?>
        <?php endif; ?>

        <?php if ( get_field( 'vision' ) ) : ?>
          <h5 class="mt-4"><strong>Firm Vision</strong></h5>
          <?php the_field( 'vision' ); ?>
        <?php endif; ?>



        <div class="light-font d-md-none">

          <?php if ( get_field( 'office_select' ) ) : ?>
            <?php $office = get_field( 'office_select' );?>
            <a href="<?php echo home_url(); ?>/contact-us#office_<?php echo $office['value']; ?>">
              <strong>Office: </strong><?php echo $office['label']; ?></p>
            </a>
          <?php endif; ?>

          <?php if ( get_field( 'email' ) ) : ?>
            <a class="d-block" href="mailto:<?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a>
          <?php endif; ?>

          <?php if ( get_field( 'phone' ) ) : ?>
            <a class="d-block" href="tel:<?php the_field( 'phone', false, false ); ?>"><?php the_field( 'phone' ); ?></a>
          <?php endif; ?>

        </div>
      </div>

    </div>

    <?php get_template_part( 'prev-next-links' ); ?>

  </div><!-- .person -->

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>


<?php get_footer(); ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

  <div <?php post_class(); ?>>
    <div class="row news-archive">

      <?php while ( have_posts() ) : the_post(); ?>

      <div class="col-12 col-md-6 cd-blog-card">

        <?php $img = get_field( 'featured_image' ); ?>

        <?php if ( $img ) : ?>
          <img src="<?php echo $img['sizes']['medium_large']; ?>" alt="<?php echo $img['alt']; ?>" class="img-fluid"/>
        <?php endif; ?>
          <div class="cd-blog-desc">

            <div class="cd-blog-tails">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <hr class="accent">
              <p><?php the_time( 'n.j.y'); ?></p>
            </div>

            <div class="text-right">
              <a href="<?php the_permalink(); ?>" class="cd-more">
                More <i class="fa fa-caret-right accent"></i>
              </a>
            </div>

          </div>

      </div>

    <?php endwhile; ?>
  </div>

</div>

<?php else: ?>

  <h3 class="mb-4">Sorry, nothing here!</h3>

<?php endif; ?>


<?php get_footer(); ?>

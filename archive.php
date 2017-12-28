<?php get_header(); ?>

<div class="row mt-2">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php $img = get_the_post_thumbnail();  ?>

    <div class="col-6 col-md-4 col-lg-3 project-grid-item-container">
      <a href="<?php the_permalink(); ?>">

        <div class="project-grid-item" style="background-image: url(<?php echo $img['sizes']['thumbnail']; ?>)">

          <div class="industry-info">
            <h4><?php the_title(); ?></h4>
            <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
          </div>

        </div>

      </a>
    </div>

  <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>

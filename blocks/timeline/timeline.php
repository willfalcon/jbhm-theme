<?php if ( get_field ( 'informationdirections' )) : ?>
  <p class="timeline-label--desktop"><?php the_field( 'informationdirections' ); ?></p>
<?php endif; ?>
<?php if ( get_field( 'mobile_directions' ) ) : ?>
  <p class="timeline-label--mobile"><?php the_field( 'mobile_directions' ); ?></p>
<?php endif; ?>

<?php if ( have_rows( 'stops' ) ) : ?>

  <div class="timeline-wrap">

    <ul class="timeline">
      <?php while ( have_rows( 'stops' ) ) : the_row(); ?>
        <?php 
          $stop_index = get_row_index() - 1; 
          $events = get_sub_field( 'events' );
          $first_event = $events[0];
          $event_count = count($events);
        ?>

        <li class="stop" data-stop-index="<?php echo $stop_index; ?>">

          <button class="stop__button" data-stop-index="<?php echo $stop_index; ?>">
            <h3 class="stop__time"><?php the_sub_field( 'time' ); ?></h3>
          </button>

          <div class="stop__image-wrap">
            <?php if ( $first_event['image'] ) : ?>
              <img class="stop__image active" src="<?php echo $first_event['image']['sizes']['medium_large']; ?>" alt="<?php echo $first_event['image']['alt']; ?>" data-event-index="0" />
            <?php endif; ?>
            <?php if ( $events ) : ?>
              <?php $i = 0; foreach ( $events as $event ) : ?>
                <?php if ( $i != 0 && $event['image'] ) : ?>
                  <img class="stop__image" data-src="<?php echo $event['image']['sizes']['medium_large']; ?>" alt="<?php echo $event['image']['alt']; ?>" data-event-index="<?php echo $i; ?>" />
                <?php endif; ?>
              <?php $i++; endforeach; ?>

              <?php if ( $event_count > 1 ) : ?>
                <ul class="event-dots">

                  <?php $i = 0; foreach ( $events as $event ) : ?>
                    <li class="event-dot">
                      <button class="event-button<?php echo $i == 0 ? ' active' : ''; ?>" data-event-index="<?php echo $i; ?>"></button>
                    </li>
                  <?php $i++; endforeach; ?>
                </ul>
              <?php endif; ?>
            <?php endif; ?>
          </div>

          <?php if ( $events ) : ?>
            <ul class="events">
              <?php $i = 0; foreach ( $events as $event ) : ?>
                <?php if ( $event['text'] ) : ?>
                  <li class="event<?php echo $i == 0 ? ' active' : ''; ?>">
                    <button data-event-index="<?php echo $i; ?>">
                      <?php echo $event['text']; ?>
                    </button>
                  </li>
                <?php endif; ?>
              <?php $i++; endforeach; ?>
            </ul>
          <?php endif; ?>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>

	<p class="social-links">

		<?php if ( get_field( 'facebook_url', 'option' ) ) : ?>
			<a href="<?php the_field( 'facebook_url', 'option' ); ?>" target="_blank">
				<i class="fa fa-facebook fa-lg"></i>
			</a>
		<?php endif; ?>

		<?php if ( get_field( 'instagram_url', 'option' ) ) : ?>
			<a href="<?php the_field( 'instagram_url', 'option' ); ?>" target="_blank">
				<i class="fa fa-instagram fa-lg"></i>
			</a>
		<?php endif; ?>

		<?php if ( get_field( 'twitter_url', 'option' ) ) : ?>
			<a href="<?php the_field( 'twitter_url', 'option' ); ?>" target="_blank">
				<i class="fa fa-twitter fa-lg"></i>
			</a>
		<?php endif; ?>

	</p>

	<br>

	<p class="footer-contact-info">

		<?php if ( get_field( 'contact_phone', 'option' ) ) : ?>
			<a href="tel:<?php the_field( 'contact_phone', 'option' ); ?>">
				<?php the_field( 'contact_phone', 'option' ); ?>
			</a>
		<?php endif; ?>

<br>

		<?php if ( get_field( 'contact_email', 'option' ) ) : ?>
			<a href="mailto:<?php the_field( 'contact_email', 'option' ); ?>">
				<?php the_field( 'contact_email', 'option' ); ?>
			</a>
		<?php endif; ?>

	</p>

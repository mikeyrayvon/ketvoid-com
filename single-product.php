<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>

		<?php while ( have_posts() ) {
				the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php } // end of the loop. ?>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

get_header(); ?>

<!-- main page content -->
<div class="main">

	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?>

</div>

<?php the_content(); ?>

<?php get_footer(); ?>

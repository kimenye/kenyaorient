<?php
/*
 * Template Name: About Us
 *
 * Description: Cornerstone loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 2.3.2
 */

get_header(); ?>

<!-- main page content -->
<div class="main">

	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?>

	<!-- Main Content -->

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
			<div class="entry-content large-8 large-centered columns">
				<?php the_content(); ?>
			</div>
		</article>

		
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>

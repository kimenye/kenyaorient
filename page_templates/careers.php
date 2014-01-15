<?php
/**
 * Template Name: Careers Page
 *
 * Page for displaying the job openings
 *
 */

get_header(); ?>

<!-- main page content -->
<div class="main careers">

	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="large-12 columns lead">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>

	<div class="row no-opening">
		<div class="large-12 columns drop">
		</div>
	</div>		

</div>

<?php get_footer(); ?>
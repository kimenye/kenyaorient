<?php get_header(); ?>
<!-- main page content -->
<div class="main">
	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?> 


	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="large-8 large-centered columns">
				<div class="content">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<header class="entry-header">
							<h5><?php the_title(); ?></h5>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</article>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
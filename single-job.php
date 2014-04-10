<?php get_header(); ?>
<!-- main page content -->
<div class="main">
	<div class="banner inner" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/images/careers_header.jpg')">
		<div class="page-title">
			<h2 class="title"> JOB OPENING <small></h2>
			<?php 
				if ( function_exists( 'breadcrumb_trail' ) ) {
					$defaults = array(
						'container'       => 'div',   // container element
						'separator'       => '', // separator between items
						'before'          => '',      // HTML to output before
						'after'           => '',      // HTML to output after
					);
					breadcrumb_trail($defaults); 
				}
			?>
		</div>
	</div>

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="large-10 columns">									
						<header class="entry-header">
							<h5><?php the_title(); ?></h5>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>

						<a href="mailto:hr@korient.co.ke" class="button tiny">Drop CV</a>
					</div>
				</div>
			</article>
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
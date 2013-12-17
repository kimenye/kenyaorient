<?php get_header(); ?>
<!-- main page content -->
<div class="main">
	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?> 


	<?php while ( have_posts() ) : the_post(); ?>
		<div class="content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="large-8 large-centered columns">									
						<header class="entry-header">
							<h5><?php the_title(); ?></h5>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
		

				<!-- Related Products -->
				<div class="row">
					<div class="others">
						<div class="large-8 large-centered columns">
							<h5>Related Products</h5>
							<?php
								$related = get_posts( array('category_in' => wp_get_post_categories($post->ID), 'numberposts' => 8,
								'post_not_in' => array($post->ID)));

								// echo "Number of related products ".count($related);
								if (count($related) > 0) {
									foreach ($related as $product) {
										
									}
								}
							?>
						</div>
					</div>
				</div>
<!-- 				$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post);
/*whatever you want to output*/
}
wp_reset_postdata(); -->

			</article>		
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
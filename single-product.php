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

 								$cats = get_the_category($post->ID);
 								
 								$ids = $cats[0]->term_id;
 								// echo "Term ID : ".$ids;

								$the_query = new WP_Query( array( 'post_type' => 'product', 'cat' => $ids, 'post__not_in' => array($post->ID) ));

								if ($the_query->have_posts()) {
									?>
										<ul class="large-block-grid-4 small-block-grid-2 small-centered columns">
											<?php
												while ( $the_query->have_posts() ) {
													$the_query->the_post();													
													?>
														<li>
															<h5><?php echo get_the_title(); ?></h5>
														</li>
													<?php
												}
											?>
										</ul>
									<?php		
								}
							?>
						</div>
					</div>
				</div>
			</article>		
		</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
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
			<div class="large-10 large-centered columns lead">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>

	<div class="row no-opening">
		<div class="large-10 large-centered columns drop">
			<p>Don't see an opening? Just drop your CV and who knows, we might call you really soon. <a href="mailto:hr@korient.co.ke" class="button tiny">Drop CV</a></p>
		</div>
	</div>	

	<div class="openings">
		<div class="row">
			<div class="large-10 large-centered columns">
				<h5>Openings</h5>
			</div>
		</div>	

		<?php
			$the_query = new WP_Query( array( 'post_type' => 'job' ));
			if ($the_query->have_posts()) {
				?>
					<div class="row">
						<div class="large-10 large-centered columns">
							<ul class="large-block-grid-3 small-block-grid-2 small-centered columns"> 
								<?php
									while ( $the_query->have_posts() ) {					
										$the_query->the_post();
										?>
											<li class="">
												<div class="posting">
													<div class="row">
														<div class="large-3 columns slim">
															<i class="folder"></i>
														</div>
														<div class="large-7 columns slim">
															<h3><?php echo get_the_title() ?></h3>
														</div>
														<div class="large-2 columns">
															<a href="<?php echo get_permalink(); ?>">
																<span class="plus">+</span>
															</a>
														</div>
													</div>												
												</div>
											</li>
										<?php
									}
								?>
							</ul>
						</div>
					</div>
				<?php
			}
			else {
				?>
					<div class="row">
						<div class="large-10 large-centered columns">
							<h6>No Job Openings at the moment</h6>
						</div>
					</div>
				<?php
			}
		?>
	</div>

</div>

<?php get_footer(); ?>
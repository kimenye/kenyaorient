<?php

/*
 * Template Name: Home
 *
 * Description: Home Page Template
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 2.3.2
 */
	get_header(); ?>

<!-- main page content -->
<div class="main">

	<!-- Main Content -->
	<div id="slider">
        <div class="row">
        	<div class="">
        		<?php
        			$the_query = new WP_Query( array( 'post_type' => 'vp_orbitslides' ));
        			if ($the_query->have_posts()) {
        				?>
        					<ul class="example-orbit" data-orbit data-options="bullets:false;slide_number:false;timer:true;timer_speed:5000;">
	        					<?php
	        						while ( $the_query->have_posts() ) {
										?>
											<li>
												<?php        							
													$the_query->the_post();
													$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), ''.$imgsize.'' ); 
													$urlimg = $img['0'];
													$caption = get_post_meta($post->ID, '_sliderCaption', TRUE);
													$link = get_post_meta($post->ID, '_sliderUrl', TRUE); 

													?>
														<div>
															<h2><?php echo get_the_title(); ?></h2>
															<p><?php echo $caption ?></p>
															<a href="<?php echo $link ?>" class="button tiny radius">READ MORE</a>
														</div>
														<img src="<?php echo $urlimg ?>" />
													<?php
												?>
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
</div>

<?php get_footer(); ?>

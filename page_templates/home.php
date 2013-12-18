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
        					<ul class="example-orbit" data-orbit data-options="bullets:false;slide_number:false;timer_speed:5000;">
	        					<?php
	        						while ( $the_query->have_posts() ) {
										?>
											<li>
												<?php        							
													$the_query->the_post();
													$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), ''.$imgsize.'' ); 
													$urlimg = $img['0'];

													echo '<img src="'.$urlimg.'" />';
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

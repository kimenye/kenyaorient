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
<div class="main home">

	<!-- Main Content -->
	<div id="slider">
        <div class="row">
        	<!-- Slider -->
        	<div class="hero-slider">
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

        	<!-- Category Navigator -->
        	<div class="category-nav">
        		<div class="row">
        			<div class="large-8 large-centered columns">
        				<ul class="large-block-grid-3">
	        				<?php
		        				$categories = get_categories( $args );

		        				foreach($categories as $category) {
		        					if ($category->name != "Uncategorized") {		        					
			        					?>
			        						<li>
			        							<a><?php echo $category->name ?></a>
			        						</li>
			        					<?php
		        					}
		        				}
		        			?>
	        			</ul>
	        		</div>
	        	</div>
        	</div>
        </div>
    </div>

    <div class="middle_links">
    	<div class="row">
    		<div class="large-4 columns">
    			<div class="financials">
    			</div>
    		</div>
    		<div class="large-4 columns">
    			<div class="branches">
    			</div>
    		</div>
    		<div class="large-4 columns">
    			<div class="careers">
    			</div>
    		</div>    		
    	</div>
    </div>

    <div class="bottom_links">
    	<div class="row">
    		<div class="large-6 small-6 columns contact_center">
    			<div class="box">
    				<div class="row">
    					<div class="large-2 columns">
    						<i class="phone"></i>
    					</div>
    					<div class="large-7 columns">
    						<h5 class="title">KENYA ORIENT CONTACT CENTER</h5>
    					</div>
    					<div class="large-3 columns">
    						<h5 class="title">0202962000</h5>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="large-6 small-6 columns news_and_events">
    			<div class="box">
    				<div class="row">
    					<div class="large-3 columns">
    						<i class="news"></i>
    					</div>
    					<div class="large-7 columns">
    						<h5 class="title">KENYA ORIENT NEWS AND EVENTS</h5>
    					</div>
    					<div class="large-2 columns">
    						<span class="plus">+</span>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<?php get_footer(); ?>

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
        </div>
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
                                        <a id="<?php echo $category->slug ?>"><?php echo $category->name ?></a>
                                    </li>
                                <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Category products -->
    <div class="category-products">
        <?php
            foreach($categories as $category) {
                if (!$category->name != "Uncategorized") {
                    ?>
                        <div class="category <?php echo $category->slug ?>">
                            <div class="row">
                                <div class="large-12 columns">                                    
                                    <?php
                                        $the_query = new WP_Query( array( 'post_type' => 'product', 'cat' => $category->term_id ));

                                        if ($the_query->have_posts()) {
                                            ?>
                                                <ul class="large-block-grid-4 small-block-grid-2 small-centered columns">
                                                    <?php
                                                        while ( $the_query->have_posts() ) {
                                                            $the_query->the_post();                                                 
                                                            ?>
                                                                <li class="product preview">
                                                                    <a href="<?php echo get_permalink(); ?>">
                                                                    <?php
                                                                        if (class_exists('MultiPostThumbnails')) :
                                                                        MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                                                                        endif;
                                                                         ?>
                                                                    </a>
                                                                    <div class="excerpt">
                                                                        <h5><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                                                        <p><?php echo get_post_meta($post->ID, 'product_teaser', TRUE); ?></p>
                                                                        <div class="row">
                                                                            <div class="large-centered columns large-6">
                                                                                <a href="<?php echo get_permalink(); ?>" class="button tiny radius">READ MORE</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                    <?php
                }
            }
        ?>
    </div>


    <div class="middle_links">
    	<div class="row">
    		<div class="large-4 small-12 columns">
    			<div class="box">
    				<div class="row financials">
    					<div class="large-2 columns">
    						<i></i>
    					</div>
    					<div class="large-8 columns">
    						<h5 class="title">2013 FINANCIALS</h5>
    						<p>Click here to see our 2013 financial results</p>
    					</div>
    					<div class="large-2 columns">
    						<span class="plus">+</span>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="large-4 small-12 columns">
    			<div class="branches box">
    				<div class="row">
	    				<div class="large-2 columns">
	    					<i class="branches"></i>
	    				</div>    			
						<div class="large-8 columns">
							<h5 class="title">BRANCH NETWORK</h5>
							<p>Need to some help? Try one of our branches countrywide</p>
						</div>			
	    				<div class="large-2 columns">
	    					<span class="plus">+</span>
	    				</div>
	    			</div>
    			</div>
    		</div>
    		<div class="large-4 small-2 columns">
    			<div class="careers box">
    				<div class="row">
	    				<div class="large-2 columns">
	    					<i class="openings"></i>
	    				</div>    			
						<div class="large-8 columns">
							<h5 class="title">CAREERS</h5>
							<p>Want to join the team? Check out our openings.</p>
						</div>			
	    				<div class="large-2 columns">
	    					<span class="plus">+</span>
	    				</div>
	    			</div>
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

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
                        $args = array('orderby' => 'ID','order' => 'ASC');
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
                                <div class="large-12 columns small-centered">                                    
                                    <?php
                                        $the_query = new WP_Query( array( 'post_type' => 'product', 'cat' => $category->term_id ));

                                        if ($the_query->have_posts()) {
                                            ?>
                                                <ul class="large-block-grid-4 small-block-grid-1 columns">
                                                    <?php
                                                        while ( $the_query->have_posts() ) {
                                                            $the_query->the_post();                                                 
                                                            ?>
                                                                <li class="product preview">
                                                                    <div class="alignment">
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

    <div id="info" class="row">
        <div class="large-12 columns small-12 small-centered">
            <ul class="large-block-grid-3 small-block-grid-1">
                <li>
                    <div class="wrapper">
                        <div class="img small-3 columns">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/financials.png">
                        </div>
                        <div class="small-7 columns">
                            <div class="content">
                                <h3>2013 FINANCIAL</h3>
                                <p>Click here to see our 2013 financial results.</p>
                            </div>
                        </div>
                        <a href="" class="open small-2 columns"> <img src="<?php echo get_stylesheet_directory_uri() ?>/images/open.png"></a>
                    </div>                
                </li>
                <li>
                <div class="wrapper">
                    <div class="img small-3 columns">
                        <a href="location/contact-us/">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/branches.png" />
                        </a>
                    </div>
                    <div class="content small-7 columns">                    
                        <h3>OUR BRANCHES</h3>
                        <p>Need to some help? Try one of our branches countrywide.</p>
                    </div>
                     <a href="location/contact-us/" class="open small-2 columns"> <img src="<?php echo get_stylesheet_directory_uri() ?>/images/open.png"></a>
                  </div>
                </li>
                <li>
                <div class="wrapper">
                    <div class="img small-3 columns">
                        <a href="/careers/">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/careers.png">
                        </a>
                    </div>
                    <div class="content small-7 columns">
                        <h3>CAREERS</h3>
                        <p>Want to join the team? Check out our openings.</p>
                    </div>
                     <a href="/careers" class="open small-2 columns"> <img src="<?php echo get_stylesheet_directory_uri() ?>/images/open.png"></a>
                 </div>   
                </li>
            </ul>
        </div>
    </div>

    <div id="notice" class="row">
        <div class="large-12 columns small-12 columns small-centered">
            <ul class="large-block-grid-2 small-block-grid-1">
                <li>
                    <div class="wrapper">
                        <div class="img small-3 columns">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/phone.png">
                        </div>
                        <div class="content small-6 columns">
                            <h3>KENYA ORIENT CONTACT CENTER</h3>                        
                        </div>
                        <div class="small-3 columns">
                            <p>020 2962000</p>                        
                        </div>
                    </div>
                </li>
                <li>
                    <div class="wrapper">
                        <div class="img small-3 columns">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/broadcast.png">
                        </div>
                        <div class="content small-6 columns">
                            <h3>KENYA ORIENT NEWS AND EVENTS</h3>                            
                        </div>                       
                        <a href="" class="open small-2 columns">  <img src="<?php echo get_stylesheet_directory_uri() ?>/images/open.png"></a>                    
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<?php
/*
 * Template Name: Products
 *
 * Description: Products
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 2.3.2
 */

get_header(); ?>


<div class="main products">
	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?>

	<?php
        $args = array('orderby' => 'ID','order' => 'ASC');
        $categories = get_categories( $args );

        foreach($categories as $category) {
            if ($category->name != "Uncategorized") {                                   
                ?>
                	<div class="row">
                		<div class="large-12 columns">
                			<h3><?php echo $category->name ?></h3>
                		</div>
                	</div>

                	<div class="category-products">
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

<?php get_footer(); ?>
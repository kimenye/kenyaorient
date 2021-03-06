<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="banner inner" style="background-image: url('<?php echo $image[0]; ?>')">
		<div class="page-title">
			<h2 class="title"> <?php echo wp_title(''); ?></h2>
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
<?php endif; ?>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="banner inner" style="background-image: url('<?php echo $image[0]; ?>')">
		<h2 class="title"> <?php echo wp_title(''); ?></h2>
	</div>
<?php endif; ?>
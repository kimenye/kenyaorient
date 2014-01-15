<?php
/**
 * Template Name: Team Page
 *
 * Page for displaying the team
 *
 */

get_header(); ?>

<!-- main page content -->
<div class="main">

	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?>

	
	<!-- Main content -->
	<?php
		$the_query = new WP_Query( array( 'post_type' => 'team_member' ));
		$bod = array();
		$mgt = array();
		if ($the_query->have_posts()) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				// $caption = get_post_meta($post->ID, '_sliderCaption', TRUE);
				$name = get_the_title();
				$bio = get_the_content();
				$pic = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				$role = get_post_meta($post->ID, 'team_role', TRUE);
				$cat = get_post_meta($post->ID, 'team_category', TRUE);

				$member = array('name' => $name, 'pic' => $pic, 'role' => $role, 'bio' => $bio);

				if ($cat == "BOD") {
					array_push($bod, $member);
				}
				else
				{
					array_push($mgt, $member);
				}

			}			
		}
	?>

	<div class="team">
		<div class="bod">
			<div class="row">
				<div class="large-12 columns">
					<h5>Board of Directors</h5>
					<?php
						if (count($bod) < 1) {
							?> <h6>We have no Board of Directors yet</h6> <?php
						} else {
							?>
								<ul class="large-block-grid-4 small-block-grid-2 small-centered columns">
									<?php
										foreach ($bod as $member) {
											$array = array_values($member);
											?>
												<li>
													<div class="member">
														<img class="th" src="<?php echo $array[1][0] ?>" />
														<div class="overlay">
															<div class="bio">
																<h6><?php echo $array[0] ?> | <?php echo $array[2] ?></h6>
																<p>
																	<?php echo $array[3] ?>
																</p>
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

		<div class="mgt">
			<div class="row">
				<div class="large-12 columns">
					<h5>Senior Management</h5>
					<?php
						if (count($mgt) < 1) {
							?> <h6>We have no Senior Managers yet</h6> <?php
						}
						else {
							?>
								<ul class="large-block-grid-4 small-block-grid-2 small-centered columns">
									<?php
										foreach ($mgt as $member) {
											$array = array_values($member);
											?>
												<li>
													<div class="member">
														<img class="th" src="<?php echo $array[1][0] ?>" />
														<div class="overlay">
															<div class="bio">
																<h6><?php echo $array[0] ?> | <?php echo $array[2] ?></h6>
																<p>
																	<?php echo $array[3] ?>
																</p>
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
	</div>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>
<!-- main page content -->
<div class="main">
	<!-- Inner Page Banner -->
	<?php get_template_part( 'banner' ); ?> 

	<!-- Search Bar -->
	<div class="search_bar">
		<div class="row">
			<div class="large-10 large-centered columns">
				<div class="row">
					<div class="large-6 columns search_instruction">
						<label class="right inline instruction">Search for our branch networks and sales agents countrywide</label>
					</div>
					<div class="large-6 columns search_form">
    					<form>
    						<div class="row">
    							<div class="small-2 columns">
						          <label for="location" class="inline">Location</label>
						        </div>
						        <div class="small-9 columns">
						          	<input type="text" id="location" placeholder="Enter a location near you *">
						        </div>
						        <div class="small-1 columns">
						        	<input type="submit" value="GO" class="button tiny" />
						        </div>
	    					</div>
    					</form>
    				</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Map -->
	<div class="row">
		<div id="map" class="map">
		</div>
	</div>

	<!-- Listing -->
	<?php 
		// $terms = wp_get_post_terms( $post_id, 'branch', $args ); 
		// // echo $terms;
		// print_r($terms);
		$branches = wp_get_post_terms($post->ID, 'Branches', array("fields" => "all"));
		// print_r($term_list);
		?>
		<div class="locations row">
			<h6><?php echo count($branches).' Branches'; ?></h6>
			<ul class="large-block-grid-4 small-block-grid-1">
				<?php
					foreach ($branches as $branch) {
						?>
							<li>
								<div class="wrapper">
									<div class="img small-3 columns">
                    					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/locations.png" />                    					
                					</div>
                					<div class="content small-9 columns">
					                    <h3><?php echo $branch->name ?></h3>
					                    <p><?php echo $branch->description ?></p>
					                </div>
								</div>
							</li>
						<?php
					}
				?>
			</ul>
		</div>
		<?php
	?>

	<script type="text/javascript">
		function initialize() {
        	var mapOptions = {
          		center: new google.maps.LatLng(1.2667, 36.8),
          		zoom: 6
        	};
        	var map = new google.maps.Map(document.getElementById("map"),
            	mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</div>
<?php get_footer(); ?>

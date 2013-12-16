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
</div>
<?php get_footer(); ?>

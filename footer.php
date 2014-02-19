<!-- Footer bar -->
<div class="footer">
	<div class="top">
		<div class="link">			
			<a href="" class="arrow"></a>
			<div class="text">
				<a>TOP</a>
			</div>			
		</div>
	</div>
	<div class="row contacts">		
		<div class="large-12 columns">
		  <div class="row">
		    <div class="large-3 columns">
		      <ul class="vcard">
		        <li>Corporate Headquarters</li>
		        <li class="street-address">6th Floor, Nairobi, Kenya</li>
		        <li class="street-address">CONTACT. 020 2961000</li>
		        <li class="street-address">Email:
		          <a href="mailto:info@korient.co.ke">info@korient.co.ke</a>
		        </li>                
		      </ul>
		    </div>
		    <div class="large-3 columns">
		      <h6>QUICK LINKS</h6>           
		      	<?php if ( has_nav_menu( 'footer-menu' ) ) {					
					wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'large-block-grid-2 small-block-grid-2 links') );
				} ?>
		    </div>
		    <div class="large-4 columns">
		      <p>Sign up to our newsletter:</p>
		      <form>
		        <div class="row collapse">
		          <div class="large-8 columns">
		            <input type="email" placeholder="Your Email *" />                    
		          </div>
		          <div class="large-4 columns">
		            <input type="submit" class="button postfix expand signup" value="Sign Up" />
		          </div>
		        </div>  
		      </form>
		    </div>
		    <div class="large-2 columns">
		      <p>
		        We are social too
		      </p>
		      <ul class="large-block-grid-4 social-icons">
		        <li>
		          <a class="facebook" href="https://www.facebook.com/kenyaorientinsurance"> 
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/fb.png" />
                          </a>
		        </li>
		        <li>
		          <a class="twitter" href="https://twitter.com/KenyaOrient">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/tw.png" />
                          </a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</div>
	</div>
</div>

<!-- Copyright -->
<div class="copyright">
  <div class="row">
    <div class="large-10 columns">
      <p>
        Copyright &copy; <?php echo date("Y"); ?> Kenya Orient Insurance Limited
      </p>
    </div>
    <div class="large-2 columns">
      <p>
        <!-- <a>
          Terms
        </a>
        &nbsp;|&nbsp;
        <a>
          Privacy
        </a> -->
      </p>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>

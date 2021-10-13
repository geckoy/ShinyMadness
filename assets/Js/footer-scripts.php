<?php 
/*********************************************************************
******************** Indexes *****************************************
**********************************************************************
===============================
~~ Index  ~~  || ~~             Page             ~~
##01          || footer script start
##02          || Global Functions
##03          || Shop page 'page.php'
##04          || Discord chat 'aside.php'
##05          || 
##06          || 
##07          || 















***********************************************************************
***********************************************************************
**********************************************************************/
#####################################################################
						/* Tests Area */
#####################################################################

		// global $template;
		// print_r( $template );
		
####01#################################################################
						/* Footer scripts start */
#####################################################################
?>
		<script id="custom-footer-scripts" type="text/javascript">
		<?php
####02#################################################################
						/* Global Functions */
#####################################################################
		?>
			function check_browser_size_Bootstrap_edition() {
				return window.innerWidth < 992;
			}
			
			<?php 
####03#################################################################
						/* Shop Page */
#######################################################################
			if(is_page('shop') || is_product_category()) {
			?>
					/* Shop Page */
						/* Filter Aside */
						var $pokes = document.getElementById("pokeSearch");
						var $pokes_full_height = $pokes.scrollHeight;
						jQuery("#effect-line").height($pokes_full_height);
						jQuery('#advanced_search_checkbox').on('click', function(){
							if(document.getElementById("advanced_search_checkbox").checked ){
								// let $pokes_click = document.getElementById("pokeSearch");
								$pokes_full_height_click = $pokes.scrollHeight;
								jQuery("#effect-line").height($pokes_full_height_click);
							}else{
								jQuery("#effect-line").height($pokes_full_height);
							}
						});
						
						jQuery('#pokemon_name_filter').on('keyup', function()
						{
							if( jQuery('#pokemon_name_filter').val() !== "" )
							{
								let $pokes_full_height_input_pokemon_press = $pokes.scrollHeight;
								jQuery("#effect-line").height($pokes_full_height_input_pokemon_press);
							}else
							{
								jQuery("#effect-line").height($pokes_full_height_click);
							}
						});

						jQuery('#pokemon_name_filter').on('blur', function()
						{
							jQuery("#effect-line").height($pokes_full_height_click);
						});
						
						/* Filter Aside */
							jQuery('#pokesbtndisplay, .static_filter_btn').on('click',function(){
								if(jQuery('#product-filter').hasClass('hide-filter')) {
									jQuery('#product-filter').removeClass('hide-filter').addClass('show-filter');
								}else{
									jQuery('#product-filter').removeClass('show-filter').addClass('hide-filter');
								}
							});
							
							jQuery('.input_wrapper input').on('input',function(){
								let $value = jQuery(this).val();
								jQuery(this).siblings(".display_filter_amount").text($value); 
							});

							jQuery('#mobile-btn-wrapper, .static_filter_btn').on('click', function(){
								if(jQuery('#product-filter').hasClass('aside_visibility_hidden')) {
									jQuery('#product-filter').removeClass('aside_visibility_hidden').addClass('aside_visibility_display');
									jQuery('body').addClass('overflownone');
								}
							});
							jQuery('#mobile-btn-colse').on('click', function(){
								if(jQuery('#product-filter').hasClass('aside_visibility_display')) {
									jQuery('#product-filter').removeClass('aside_visibility_display').addClass('aside_visibility_hidden');
									jQuery('body').removeClass('overflownone');
								}
							});
							
						<?php 
						if( is_page("shop") )
						{ ?>
						
							jQuery(document).ready( function () {
								jQuery('.product-carousel').flickity({
									// options
									cellAlign: 'center',
									pageDots: false,
									contain: true,
									autoPlay: true,
									selectedAttraction: 0.18,
									friction: 1,
									autoPlay: 5000,
								}); 
								
							});
						<?php  
						} ?>
			<?php } ?>
		</script>
				<div class="container-fluid pb-lg-4 bg-poke-blue">
					<div id="main-posts" class="container-xl">
						<?php do_action( 'woocommerce_before_shop_loop' ); ?>
						<!-- Pc View -->
						<div id="show" class="shadow_tarts" >
							<div class="row gx-0 mx-0 h-100 w-100">
								<div class="col-lg-5 px-0 d-flex flex-column mx-0 h-100 w-100">
									<div id="columned_screen_1">
										<img src="<?= set_image('Shop_tv_1') ?>">
										<div><p>No More Time Wasting, to LEVEL UP !<span>Get High Level Accounts with Shiny pokemons in Minute!</span></p></div>
									</div>
									<div id="columned_screen_2">
										<img src="<?= set_image('Shop_tv_2') ?>">
										<div><p>What are waiting for, buy and start playing NOW! </p></div>
									</div>
								</div>
								<div id="wide_screen" class="col-lg-7 px-0">
									<img src="<?= set_image("Shop_tv") ?>">
									<div><p>Buy New Pokemon Accounts with cheap price that you'll never find anywhere<span>Changeable Email, High IV, Different Levels, No Bans, Instant Delivery !</span></p></div>
								</div>
							</div>
						</div>
						<!-- Mobile View -->
						<div class="d-lg-none pt-3 mobile_shop_wrapper">
							<div class="text_mobile_shop_holder">
								<p>Get High Level Accounts without wasting your Time !</p>
								<h1>Buy Your Pokémon GO Account With Cheap Price !</h1>
								<p>Changeable Email, High IV, Different Levels, No Bans, Instant Delivery !</p>
							</div>
						</div>
					</div>
				</div>
					<?php // Recommended ?>
					<article class="pokemon-cards recommended-accounts-article">
					
						<div class="bg-transparent position-relative z-index1">
							<svg id="waveTop" style="top: -2;" viewBox="0 0 1440 100" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(243, 106, 62, 1)" offset="0%" data-darkreader-inline-stopcolor="" style="--darkreader-inline-stopcolor:#a4300a;"></stop><stop stop-color="rgba(255, 179, 11, 1)" offset="100%" data-darkreader-inline-stopcolor="" style="--darkreader-inline-stopcolor:#c58800;"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="#007be3" d="M0,10L60,21.7C120,33,240,57,360,70C480,83,600,87,720,88.3C840,90,960,90,1080,83.3C1200,77,1320,63,1440,58.3C1560,53,1680,57,1800,63.3C1920,70,2040,80,2160,75C2280,70,2400,50,2520,50C2640,50,2760,70,2880,80C3000,90,3120,90,3240,85C3360,80,3480,70,3600,60C3720,50,3840,40,3960,45C4080,50,4200,70,4320,71.7C4440,73,4560,57,4680,41.7C4800,27,4920,13,5040,11.7C5160,10,5280,20,5400,35C5520,50,5640,70,5760,76.7C5880,83,6000,77,6120,75C6240,73,6360,77,6480,65C6600,53,6720,27,6840,26.7C6960,27,7080,53,7200,60C7320,67,7440,53,7560,40C7680,27,7800,13,7920,6.7C8040,0,8160,0,8280,10C8400,20,8520,40,8580,50L8640,60L8640,100L8580,100C8520,100,8400,100,8280,100C8160,100,8040,100,7920,100C7800,100,7680,100,7560,100C7440,100,7320,100,7200,100C7080,100,6960,100,6840,100C6720,100,6600,100,6480,100C6360,100,6240,100,6120,100C6000,100,5880,100,5760,100C5640,100,5520,100,5400,100C5280,100,5160,100,5040,100C4920,100,4800,100,4680,100C4560,100,4440,100,4320,100C4200,100,4080,100,3960,100C3840,100,3720,100,3600,100C3480,100,3360,100,3240,100C3120,100,3000,100,2880,100C2760,100,2640,100,2520,100C2400,100,2280,100,2160,100C2040,100,1920,100,1800,100C1680,100,1560,100,1440,100C1320,100,1200,100,1080,100C960,100,840,100,720,100C600,100,480,100,360,100C240,100,120,100,60,100L0,100Z"></path></svg>					
						</div>
					
						<div class="container-xl pt-5 position-relative z-index2" style="margin-bottom:100px;">
							<div class="categories-links">
								<div>
									<h1 style="color:#007be3;">Not Sure what to buy ?</h1>
									<span>Check our Recommended POGO Accounts</span>
								</div>
														
							</div>
							


							<div class="container pokemons-card p-0">
								
									<?php
									$args = array(
										'post_type' 	 => 'product',
										'product_cat' 	 => 'shiny,zero-shiny',
										'posts_per_page' => 15,
										'orderby' 		 => 'meta_value_num',
										'meta_key' 		 => '_price',
										'order'    		 => 'desc',
										'meta_query' 	 => array(
											['key'     => "_stock_status", 'value'   => "instock", 'compare' => '='],
										),
									);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) { ?>
										<div class="product-carousel w-100">
										<?php
										while ( $loop->have_posts() ) : $loop->the_post(); 
											?><div class="product_carousel-cell "><?php
											get_template_part( 'template-parts/Product' );
											?></div><?php
										endwhile;?>
											<div class="product_carousel-cell looking-more">
												<h4>Looking For More For more Accounts ?</h4>
												<a href="<?= get_site_url( NULL, "product-category/sale/?orderby=price-desc" ) ?>" target="_blank">Check Accounts !</a>
											</div>
										</div><?php
									} else {
										echo __( 'No products found' );
									}
									wp_reset_postdata();
									?>
							</div>
						</div>
						<div  class="z-index1 position-relative">
							<svg id="waveBottom" style="bottom: -2;" viewBox="0 0 1440 100" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(243, 106, 62, 1)" offset="0%" data-darkreader-inline-stopcolor="" style="--darkreader-inline-stopcolor:#a4300a;"></stop><stop stop-color="rgba(255, 179, 11, 1)" offset="100%" data-darkreader-inline-stopcolor="" style="--darkreader-inline-stopcolor:#c58800;"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="#007be3" d="M0,70L60,63.3C120,57,240,43,360,35C480,27,600,23,720,31.7C840,40,960,60,1080,60C1200,60,1320,40,1440,33.3C1560,27,1680,33,1800,40C1920,47,2040,53,2160,53.3C2280,53,2400,47,2520,50C2640,53,2760,67,2880,75C3000,83,3120,87,3240,86.7C3360,87,3480,83,3600,78.3C3720,73,3840,67,3960,66.7C4080,67,4200,73,4320,78.3C4440,83,4560,87,4680,75C4800,63,4920,37,5040,23.3C5160,10,5280,10,5400,15C5520,20,5640,30,5760,38.3C5880,47,6000,53,6120,56.7C6240,60,6360,60,6480,55C6600,50,6720,40,6840,36.7C6960,33,7080,37,7200,43.3C7320,50,7440,60,7560,63.3C7680,67,7800,63,7920,58.3C8040,53,8160,47,8280,36.7C8400,27,8520,13,8580,6.7L8640,0L8640,100L8580,100C8520,100,8400,100,8280,100C8160,100,8040,100,7920,100C7800,100,7680,100,7560,100C7440,100,7320,100,7200,100C7080,100,6960,100,6840,100C6720,100,6600,100,6480,100C6360,100,6240,100,6120,100C6000,100,5880,100,5760,100C5640,100,5520,100,5400,100C5280,100,5160,100,5040,100C4920,100,4800,100,4680,100C4560,100,4440,100,4320,100C4200,100,4080,100,3960,100C3840,100,3720,100,3600,100C3480,100,3360,100,3240,100C3120,100,3000,100,2880,100C2760,100,2640,100,2520,100C2400,100,2280,100,2160,100C2040,100,1920,100,1800,100C1680,100,1560,100,1440,100C1320,100,1200,100,1080,100C960,100,840,100,720,100C600,100,480,100,360,100C240,100,120,100,60,100L0,100Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(243, 106, 62, 1)" offset="0%" data-darkreader-inline-stopcolor="" style="--darkreader-inline-stopcolor:#a4300a;"></stop><stop stop-color="rgba(255, 179, 11, 1)" offset="100%" data-darkreader-inline-stopcolor="" style="--darkreader-inline-stopcolor:#c58800;"></stop></linearGradient></defs></svg>
						</div>
					</article>

				<div class="container-fluid p-0 bg-poke-blue">
					<div id="main-posts" class="container-xl">					
						<?php // Shiny ?>
						<article class="pokemon-cards pt-5 shiny-accounts-article">
							<div class="categories-links">
								<div>
									<h1>Want Account with Shiny Pokemon ?</h1>
									<span>Check our Powerful Shiny pokemon</span>
								</div>
							</div>
								<div class="pokemons-card">
									
										<?php
										$args = array(
											'post_type' 	 => 'product',
											'product_cat' 	 => 'shiny',
											'posts_per_page' => 15,
											'orderby' 		 => 'meta_value_num',
											'meta_key' 		 => '_price',
											'order'    		 => 'desc',
											'meta_query' 	 => array(
												['key'     => "_stock_status", 'value'   => "instock", 'compare' => '='],
											),
										);
										$loop = new WP_Query( $args );
										if ( $loop->have_posts() ) { ?>
											<div class="product-carousel w-100">
											<?php
											while ( $loop->have_posts() ) : $loop->the_post(); 
												?><div class="product_carousel-cell"><?php
												get_template_part( 'template-parts/Product' );
												?></div><?php
											endwhile;?>
												<div class="product_carousel-cell looking-more">
													<h4>Looking For More For more Accounts ?</h4>
													<a href="<?= get_site_url( NULL, "product-category/shiny/?orderby=price-desc" ) ?>" target="_blank">Check Accounts !</a>
												</div>
											</div><?php
										} else {
											echo __( 'No products found' );
										}
										wp_reset_postdata();
										?>
									
								</div>
						</article>

						<?php //zero shiny ?>
						<article class="pokemon-cards pt-5 zero-shiny-accounts-article">
						<div class="categories-links">
							<div>
								<h1>Want Account with non Shiny Pokemon ?</h1>
								<span>Check our Powerful zero Shiny pokemon</span>
							</div>
						</div>
								<div class="pokemons-card">
									<?php
									$args = array(
										'post_type' => 'product',
										'product_cat' => 'zero-shiny',
										'posts_per_page' => 15,
										'orderby' => 'meta_value_num',
										'meta_key' => '_price',
										'order' => 'desc',
										'meta_query' 	 => array(
											['key'     => "_stock_status", 'value'   => "instock", 'compare' => '='],
										),
									);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) { ?>
										<div class="product-carousel w-100">
										<?php
										while ( $loop->have_posts() ) : $loop->the_post();
											?><div class="product_carousel-cell "><?php
											get_template_part( 'template-parts/Product' );
											?></div><?php
										endwhile;?>
											<div class="product_carousel-cell looking-more">
												<h4>Looking For More For more Accounts ?</h4>
												<a href="<?= get_site_url( NULL, "product-category/vanilla-accounts/?orderby=price-desc" ) ?>" target="_blank">Check Accounts !</a>
											</div>
										</div><?php
									} else {
										echo __( 'No products found' );
									}
									wp_reset_postdata();
									?>
								</div>
						</article>
				
						<?php //Level 40 Vanilla 10$ ?>
						<article class="pokemon-cards pt-5 vanilla-accounts-article">
						<div class="categories-links">
							<div>
								<h1>Want Level 40 with good price ?</h1>
								<span>Check our Powerful Vanilla 10$ Accounts</span>
							</div>
						</div>
								<div class="pokemons-card">
									<?php
									$args = array(
										'post_type' => 'product',
										'product_cat' => 'vanilla-accounts',
										'posts_per_page' => 15,
										'meta_query' 	 => array(
											['key'     => "_stock_status", 'value'   => "instock", 'compare' => '='],
										),
									);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) { ?>
										<div class="product-carousel w-100">
										<?php
										while ( $loop->have_posts() ) : $loop->the_post();
											?><div class="product_carousel-cell "><?php
											get_template_part( 'template-parts/Product' );
											?></div><?php
										endwhile;?>
											<div class="product_carousel-cell looking-more">
												<h4>Looking For More For more Accounts ?</h4>
												<a href="<?= get_site_url( NULL, "product-category/vanilla-accounts/?orderby=price-desc" ) ?>" target="_blank">Check Accounts !</a>
											</div>
										</div><?php
									} else {
										echo __( 'No products found' );
									}
									wp_reset_postdata();
									?>
								</div>
						</article>






















						<?php // Cheap ?>
						<article class="pokemon-cards pt-5 cheap-accounts-article">
							<div class="categories-links">
								<div>
									<h1>Want Account with Cheap Price ?</h1>
									<span>Don't worry you're in the right place</span>
								</div>
							</div>
								<div class="pokemons-card">
									
										<?php
										$args = array(
											'post_type' 	 => 'product',
											'product_cat' 	 => 'shiny,zero-shiny',
											'posts_per_page' => 15,
											'orderby' 		 => 'meta_value_num',
											'meta_key' 		 => '_price',
											'order'    		 => 'asc',
											'meta_query' 	 => array(
												['key'     => "_stock_status", 'value'   => "instock", 'compare' => '='],
											),
										);
										$loop = new WP_Query( $args );
										if ( $loop->have_posts() ) { ?>
											<div class="product-carousel w-100">
											<?php
											while ( $loop->have_posts() ) : $loop->the_post(); 
												?><div class="product_carousel-cell"><?php
												get_template_part( 'template-parts/Product' );
												?></div><?php
											endwhile;?>
												<div class="product_carousel-cell looking-more">
													<h4>Looking For More For more Accounts ?</h4>
													<a href="<?= get_site_url( NULL, "product-category/sale/?orderby=price" ) ?>" target="_blank">Check Accounts !</a>
												</div>
											</div><?php
										} else {
											echo __( 'No products found' );
										}
										wp_reset_postdata();
										?>
									
								</div>
						</article>
						<div class="info_container_shop">
							<div class="categories-links">
								<div>
									<h1>Need Assistance !?</h1>
									<span>Let's Check it Together</span>
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-lg-4 p-2"><div class="shadow info_container_card"><img src="<?= set_image("info_container_img_1") ?>"><h4>1# Got a Question ?</h4><p>Visit Frequently Asked Question page !</p><button onclick="location.href = '/faq'">Visit</button></div></div>
								<div class="col-lg-4 p-2"><div class="shadow info_container_card"><img class="middle_info_container_card" src="<?= set_image("info_container_img_2") ?>"><h4>2# Why Us?</h4><p>Purchasing Pokémon Go Accounts from our website is the right place for you, Cheap & Easy !</p></div></div>
								<div class="col-lg-4 p-2"><div class="shadow info_container_card"><img src="<?= set_image("info_container_img_3") ?>"><h4>3# Still Need Help ?</h4><p>Contact our Online Customer Service !</p><button onclick="$crisp.push(['do', 'chat:open'])">Contact</button> </div></div>
							</div>
						</div>
					</div>	
<!-- 					<marquee behavior="" style="width:100%;" direction="left"><img src="http://127.0.0.1/wp-content/uploads/2021/07/pikachu_walking.gif"></marquee>-->
				</div>

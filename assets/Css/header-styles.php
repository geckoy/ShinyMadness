	<style type="text/css">
	/* Single product page */
		<?php if(is_product()){ ?>
			#main-posts{
				background-color:transparent!important;
			}
			#Pokemons-table,
			#pokemons_items_table,
			#pokemons_candies_table {
				width:100%!important;
			}
			.woocommerce-Price-amount
			{
				color:white;
			}
			@media screen and (max-width:991px){
				#main-posts {
					padding: 10px!important;
					margin-top: 25px;
				}
			}
		<?php } 
	/* Shop page */
		if(is_page( 'shop' )){ ?>
	  		#main-posts{
				position:relative;
				background-color: #007be3;
				min-height:50px!important;
	 		}
		<?php } elseif(is_page() || is_single()) { ?>
				#main-posts {
					position:relative;
				}
		<?php } ?>
		@font-face {
			font-family: GreekyFont;
			src: url(<?= get_stylesheet_directory_uri() ?>/assets/fonts/geek.ttf);
		}
		@font-face {
			font-family: vikingFont;
			src: url(<?= get_stylesheet_directory_uri() ?>/assets/fonts/Heorot-4rLK.ttf);
		}
		@font-face {
			font-family: PokemonSolid;
			src: url(<?= get_stylesheet_directory_uri() ?>/assets/fonts/Pokemon-Solid.ttf);
		}
		
	</style>
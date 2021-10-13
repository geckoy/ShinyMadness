<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;



global $product;
global $wpdb;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
//echo $product->get_category_ids()[0];


$args = [
	'account_data' => [
		'status' => true,
	],
	'pokemons' 	   => [
		'status' => true,
	]
];
$Account = account_data_retriever( $args, $product->id, 'single_product');

$single_product_data = $Account->account_data;
$single_product_pokemons = $Account->account_pokemons ;
$single_product_Items = $Account->account_items;
$single_product_candies = $Account->account_candies;

if(! $single_product_data )
{
	?><h1 style="text-align:center;color:white;">INTERNAL ERROR RETRY! (ˉ﹃ˉ)</h1><?php
	return;
}

//print_r($single_product_data);
?>
<style type="text/css">
	<?php if($single_product_data->level == 40 ) 
	{ 
			if($single_product_data->shinycount > 0)
			{?>
				#body
				{
					background-color: #3800a9!important;
					background:none;
				}
				.entry-box,
				.product-cart-data,
				.product-cart-data-table
				{
					background: #8E2DE2!important;  /* fallback for old browsers */
					background: -webkit-linear-gradient(to right, #4A00E0, #8E2DE2)!important;  /* Chrome 10-25, Safari 5.1-6 */
					background: linear-gradient(to right, #4A00E0, #8E2DE2)!important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				}
			<?php }else
			{ ?>
				#body
				{
					background-color: #1d0529!important;
					background:none;
				}
				.entry-box,
				.product-cart-data,
				.product-cart-data-table
				{
					background: #41295a!important;  /* fallback for old browsers */
					background: -webkit-linear-gradient(to right, #2F0743, #41295a)!important;  /* Chrome 10-25, Safari 5.1-6 */
					background: linear-gradient(to right, #2F0743, #41295a)!important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				}
			<?php }

	}elseif($single_product_data->level >= 30 && $single_product_data->level <= 34 ) 
	{ 
			if($single_product_data->shinycount > 0)
			{?>
				#body
				{
					background-color: #4498ab!important;
					background:none;
				}
				.entry-box,
				.product-cart-data,
				.product-cart-data-table
				{
					background: #2193b0!important;  /* fallback for old browsers */
					background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0)!important;  /* Chrome 10-25, Safari 5.1-6 */
					background: linear-gradient(to right, #6dd5ed, #2193b0)!important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				}
			<?php }else
			{ ?>
				#body
				{
					background-color: #10213e!important;
					background:none;
				}
				.entry-box,
				.product-cart-data,
				.product-cart-data-table
				{
					background: #1e3c72!important;  /* fallback for old browsers */
					background: -webkit-linear-gradient(to right, #2a5298, #1e3c72)!important;  /* Chrome 10-25, Safari 5.1-6 */
					background: linear-gradient(to right, #2a5298, #1e3c72)!important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				}
			<?php }

	}elseif($single_product_data->level >= 35 && $single_product_data->level <= 39 ) 
	{ 
			if($single_product_data->shinycount > 0)
			{?>
				#body
				{
					background-color: #7ba3b5!important;
					background:none;
				}
				.entry-box,
				.product-cart-data,
				.product-cart-data-table
				{
					background: #67B26F!important;  /* fallback for old browsers */
					background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F)!important;  /* Chrome 10-25, Safari 5.1-6 */
					background: linear-gradient(to right, #4ca2cd, #67B26F)!important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				}
			<?php }else
			{ ?>
				#body
				{
					background-color: #10213e!important;
					background:none;
				}
				.entry-box,
				.product-cart-data,
				.product-cart-data-table
				{
					background: #0d2b3b!important;  
					background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F)!important;  
					background: linear-gradient(to right, #0d2b3b, #032707)!important;
				}
			<?php }

	} ?>
</style>
<script type="text/javascript">

	jQuery(document).ready(function(){
		var maxpokestorage = new ldBar(".maxpokestorage", {
				"stroke": 'blue',
				"stroke-width": 10,
				"preset": "circle",
				"value": 0
		});
		var maxitemstorage = new ldBar(".maxitemstorage", {
				"stroke": 'blue',
				"stroke-width": 10,
				"preset": "circle",
				"value": 0
		});
		var $account_details_wrapper = document.getElementById('account-details-wrapper').offsetTop;
		
		window.onscroll = function () {
			var currentScrollPos = window.pageYOffset;
			
			if(currentScrollPos > $account_details_wrapper) {
				setTimeout(() => {
					maxpokestorage.set(<?= (($single_product_data->totalPokemon) / ($single_product_data->maxPokemonStorage))*100 ?>);
					maxitemstorage.set(<?= (($single_product_data->totalItems) / ($single_product_data->maxItemStorage))*100 ?>);
				}, 500);
				
			}else{
				setTimeout(() => {
					maxpokestorage.set(0);
					maxitemstorage.set(0);
				}, 500);
				
			}
		};


	});
</script>
<?= $product->get_price_html() ?>
<?php add_product_url( 'single', $product); ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    
    <div class="px-3 entry-box">
		<div class="row m-0" style="height:100%;width:100%;">
			<div class="col-lg-3 p-lg-4 p-4 entry-box-logo"><!-- p2 -->
				<img class="team-logo" src="<?= set_team_image($single_product_data->team) ?>" alt="">
			</div>
			<div class="col-lg-9 p-2" style="height: 100%;">
				<div class="d-flex flex-column" style="height:100%;">
					<div style="height:40%;font-size:40px;font-weight:bold;text-align:center;">LEVEL <?= esc_html($single_product_data->level); ?></div>
					<div style="height:60%;">
						<div class="row p-2">
							<div class="col-lg-6">
								<div class="row mb-2">
									<div class="col-6">
										<div class="d-flex flex-column">
										<img src="<?= set_image("stardust_icon") ?>" style="transform:rotate(20deg);height:50px;object-fit:contain;" alt="">
										<span style="text-align:center;font-weight:bold;">Stardust</span>
										<span style="text-align:center;"><?= esc_html($single_product_data->stardust);?></span>
										</div>
									</div>
									<div class="col-6">
										<div class="d-flex flex-column">
											<img src="<?= set_image("charizard_wingy") ?>" style="height:50px;object-fit:contain;" alt="">
											<span style="text-align:center;font-weight:bold;">Total pokemons</span>
											<span style="text-align:center;"><?= esc_html($single_product_data->totalPokemon);?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row mb-2">
									<div class="col-6">
										<div class="d-flex flex-column">
											<img src="<?= set_image("pokeball") ?>" class="items_logo" alt="">
											<span style="text-align:center;font-weight:bold;">Total Items</span>
											<span style="text-align:center;"><?= esc_html($single_product_data->totalItems);?></span>
										</div>
									</div>
									<div class="col-6">
										<div class="d-flex flex-column">
											<img src="<?= set_image("pokecoin") ?>" class="items_logo" alt="">
											<span style="text-align:center;font-weight:bold;">Pokecoins</span>
											<span style="text-align:center;"><?= esc_html($single_product_data->pokeCoins);?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="account-details-wrapper">
		<div style="height:15%;">
			<h1 class="account-details-header"><img src="<?= set_image("account_details_icon") ?>"> ACCOUNT DETAILS</h1>
			<hr class="bg-poke-blue">
		</div>
		<div class="row" style="height:85%;">
			<div class="col-lg-6 account-details-yellow-boxes-global-wrapper">
				<div class="d-flex flex-column" style="height:100%;">
					<div class="account-details-yellow-boxes-wrapper"> <div class="account-details-yellow-boxes"><span style="font-weight:bold;">Start Date : </span><?= esc_html($single_product_data->startDate) ?></div></div>
					<div class="account-details-yellow-boxes-wrapper"> <div class="account-details-yellow-boxes"><span style="font-weight:bold;">Pokemon Encountered :</span> <?= esc_html($single_product_data->pokemonEncountered) ?></div></div>
					<div class="account-details-yellow-boxes-wrapper"> <div class="account-details-yellow-boxes"><span style="font-weight:bold;">kilometers Walked :</span>  <?= esc_html($single_product_data->kilometersWalked) ?></div></div>
					<div class="account-details-yellow-boxes-wrapper"> <div class="account-details-yellow-boxes"><span style="font-weight:bold;">Experience :</span> <?= esc_html($single_product_data->experience) ?></div></div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row" style="height:100%;">
					<div class="col-6" style="height:50%;"><div class="d-flex flex-column"style="text-align:center;padding-top:10%;"><div style="margin:auto;" class="maxpokestorage label-center"></div><span style="font-weight:bold;">Pokemon Storage</span></div></div>
					<div class="col-6" style="height:50%;"><div class="d-flex flex-column"style="text-align:center;padding-top:10%;"><div style="margin:auto;" class="maxitemstorage label-center"></div><span style="font-weight:bold;">Item Storage</span></div></div>
					<div class="col-6" style="height:50%;"><div class="d-flex flex-column"style="text-align:center;padding-top:10%;"><div class="d-flex flex-column"><div><img src="<?= set_image("shiny_icon") ?>" style="height:100px;object-fit:cover;" alt="" /></div><span style="font-weight:bold;"><?= esc_html($single_product_data->shinycount) ?>° Shiny Pokemon</span></div></div></div>
					<div class="col-6" style="height:50%;"><div class="d-flex flex-column"style="text-align:center;padding-top:10%;"></div></div>
				</div>
			</div>
		</div>
	</div>
	

	<div style="border-radius:25px 25px 25px 25px;margin-bottom:100px;box-shadow: 0 1rem 3rem rgba(0,0,0,.5)!important;width:100%;">
		<div class="px-3 product-cart-data" >
			<img src="<?= set_image("account_pokemon_icon") ?>"> POKEMONS
		</div>
		<div class="px-3 row product-cart-data-table m-0"style="border-radius:0px 0px 25px 25px;color:white;height:auto;width:100%;background-image: linear-gradient(134deg, rgba(5,5,5,1) 0%, rgba(18,18,18,1) 50%, rgba(37,37,37,1) 100%);">
			<table id="Pokemons-table" class="hover"><!-- class="display" -->
				<thead>
					<tr>
						<th>Name</th>
						<th>cp</th>
						<th>ivsPercentage</th>
						<th>move1Name</th>
						<th>move2Name</th>
						<th>creationDate</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($single_product_pokemons)
					{
						//	echo   '<td><img style="height:41px;width:50px;margin-right:10px;object-fit:contain;"src="https://mygod.github.io/pokicons/v2/'.$pokemon->id.'.png">'.$pokemon["name"].'</td><td>'.$pokemon["cp"].'</td><td>'.$pokemon["ivsPercentage"].'%</td><td>'.$pokemon["move1Name"].'</td><td>'.$pokemon["move2Name"].'</td><td>'.$pokemon["creationDate"].'</td>';
						foreach($single_product_pokemons as $pokemon){
						?> 
						<tr>
							 
							<td>
							   	<img style="height:41px;width:50px;margin-right:10px;object-fit:contain;"src="<?= set_pokemon_image($pokemon->id,(bool)$pokemon->isShiny,"pokemon_icon_single") ?>"><?= esc_html($pokemon->name);  ?><?php if((bool)$pokemon->isShiny){?><span style="display:none;">shiny</span> <?php } ?>
							</td>
							<td><?= esc_html($pokemon->cp) ?></td>
							<td><?= esc_html($pokemon->ivsPercentage) ?>%</td>
							<td><?= esc_html($pokemon->move1Name) ?></td>
							<td><?= esc_html($pokemon->move2Name) ?></td>
							<td><?= milli_date($pokemon->creationTimestamp) ?></td>
							
						</tr>
						<?php
						}
					}
					?>
				</tbody>
			</table>
			
		</div>
	</div>
	<div style="border-radius:25px 25px 25px 25px;margin-bottom:100px;box-shadow: 0 1rem 3rem rgba(0,0,0,.5)!important;width:100%;">
			<div class="px-3 product-cart-data" >
			<img src="<?= set_image("account_items_icon") ?>"> ITEMS
			</div>
			<div class="px-3 row product-cart-data-table m-0"style="border-radius:0px 0px 25px 25px;color:white;width:100%;background-image: linear-gradient(134deg, rgba(5,5,5,1) 0%, rgba(18,18,18,1) 50%, rgba(37,37,37,1) 100%);">
				<table id="pokemons_items_table" class="hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Item</th>
								<th>Count</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if($single_product_Items)
						{
							//$items_encoded = json_decode( $single_product_Items->Items, true );
							//echo '<td><span style="display:none;">'.$item_id.'</span><img style="height:39px;object-fit:contain;width:50px;" src="https://mygod.github.io/pokicons/v2/'.$item_id.'.png"></td><td>'.$item_value['name'].'</td><td>'.$item_value['count'].'</td>';</tr>
								foreach($single_product_Items as $item_id => $item_value){?>
									<tr>
										<td>
											<span style="display:none;"><?= esc_html($item_id) ?></span>
											<img style="height:39px;object-fit:contain;width:50px;" src="<?= set_pokemon_item_image($item_id, "pokemon_icon_single") ?>">
										</td>
										<td>
											<?= esc_html($item_value['name']) ?>
										</td>
										<td>
											<?= esc_html($item_value['count']) ?>
										</td>
									</tr>
									<?php
								}
						}
						?>
						</tbody>
				</table>
			</div>
	</div>
	<div style="border-radius:25px 25px 25px 25px;margin-bottom:100px;box-shadow: 0 1rem 3rem rgba(0,0,0,.5)!important;width:100%;">
		<div class="px-3 product-cart-data" >
			<img src="<?= set_image("account_candy_icon") ?>"> Candies
		</div>
		<div class="px-3 row product-cart-data-table m-0"style="border-radius:0px 0px 25px 25px;color:white;width:100%;background-image: linear-gradient(134deg, rgba(5,5,5,1) 0%, rgba(18,18,18,1) 50%, rgba(37,37,37,1) 100%);">
			<table id="pokemons_candies_table" class="hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>candy</th>
							<th>xlCandy</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if($single_product_candies)
					{
						foreach($single_product_candies as $candy_id => $candy_value){?>
							<tr>
								<td>
									<span style="display:none;"><?= esc_html($candy_id) ?></span>
									<img style="height:39px;object-fit:contain;width:50px;" src="<?= set_pokemon_image($candy_id, false,"pokemon_icon_single") ?>">
								</td>
								<td><?= esc_html($candy_value['candyCount']) ?></td>
								<td><?= esc_html($candy_value['xlCandyCount']) ?></td>
							</tr>
							<?php
						}
					}
					?>
					</tbody>
			</table>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php
global $product;
global $wpdb;



$cache_group = (empty($args[$product->id]['cache_group'])) ? 'shop_page' : $args[$product->id]['cache_group'];
$selected_pokemons = (empty($args[$product->id]['selected_pokemons'])) ? '' : $args[$product->id]['selected_pokemons'];
$args = (empty($args[$product->id]['query'])) ? [
	'account_data' => [
		'status' => true,
	],
	'pokemons' 	   => [
		'status' => true,
        'limit'  => '09',
        'orderby'=> 'isShiny DESC, cp DESC',
    ],
] : $args[$product->id]['query'];

    

$Account = account_data_retriever( $args, $product->id, $cache_group);
$product_data = $Account->account_data;



if(! $product_data) return;
$have_shiny = ($product_data->shinycount > 0) ? 'shiny' : 'zero';
$product_pokemons = $Account->account_pokemons;
$product_items = $Account->account_items;
// printer( $args );
//     return;
?>
    <div class="card-wrapper <?php if(! is_page('shop')) echo "col-lg-4" ?> px-lg-1 pr-xl-1 pl-xl-2 mb-5">

        <div class="card shadow user-select-none card-header-<?= esc_html($product_data->level) ?>-<?= esc_html($have_shiny) ?>">
            <div class="card-header" style="position:relative;">
                <div class="price-tag"><?= $product->get_price_html() ?></div>
                <div class="product_name">#<?= $product->get_name() ?></div>
                <div class="row">
                    <div class="col-3 pl-xl-1 pl-1 pl-lg-0 mt-1 p-0"><img class="card-team-img" src="<?= set_team_image($product_data->team, "pokemon_team_icon") ?>" alt="" srcset=""></div>
                    <div class="col-9 pl-2 p-0 d-flex flex-column" style="line-height: 150%;z-index: 1;"><h4 style="margin:0;">LEVEL <?= esc_html($product_data->level); ?></h4><span>Stardust : <?php echo $product_data->stardust; ?></span><span>Start date : <?php echo date("m/d/Y", strtotime($product_data->startDate)); ?></span></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row pokemons_wrapper_controller">
                    <div class="col-6 display_pokemon pokemons_card_is_selected"><h6>POKEMONS</h6><?= esc_html($product_data->totalPokemon) ?>/<?= esc_html($product_data->maxPokemonStorage) ?></div>
                    <div class="col-6 display_item"><h6>ITEMS</h6><?= esc_html($product_data->totalItems) ?>/<?= esc_html($product_data->maxItemStorage) ?></div>
                </div>
                <div class="row pokemons_wrapper">
                <?php 
                if($product_pokemons)
                {
                    foreach($product_pokemons as $pokemon){?>							 
                        <div class="col-4 mb-3 d-flex px-1 flex-column card-pokemons" <?php if(!empty($selected_pokemons) && in_array($pokemon->id, $selected_pokemons) ) { echo "style='background-color:#f2f29e;'"; }?> data-ot="<h4><?= esc_html($pokemon->name) ?></h4><div class='d-flex flex-column tooltip_content'><div>move1Name : <?= esc_html($pokemon->move1Name) ?></div><div>move2Name : <?= esc_html($pokemon->move2Name) ?></div><div>ivsPercentage : <?= esc_html($pokemon->ivsPercentage) ?>%</div></div>">
                            <h6>
                                <span>CP</span>
                                <span><?= esc_html($pokemon->cp) ?></span>
                            </h6>
                            <img src="<?= set_pokemon_image($pokemon->id, (bool)$pokemon->isShiny, "pokemon_icon") ?>" alt="<?= esc_html($pokemon->name) ?>">
                            <h6 class="pokemon-name"><?= esc_html($pokemon->name) ?></h6>
                        </div>											
                  <?php  }
                }
                else
                {
                    ?><h4 class="text-center w-100">NO Pokemons are available!</h4>                  
                    <img class="w-100" src="<?= set_image("no-pokemon") ?>" alt="No Pokemon found"><?php
                }
                ?>
                </div>

                <div class="items_wrapper d-none">
                <?php 
                   
                if($product_items)
                {
                    ?><div class="d-flex flex-column"><?php
                    foreach($product_items as $key => $value){?>	
                            <div class="row no-gutters" style="height:100px;">
                                <img class="col-3" style="max-height:70px;object-fit:contain;" src="<?= set_pokemon_item_image($key)?>">
                                <div class="col-8 p-2"><h6><?= esc_html($value['name']) ?></h6><p>Count : <?= esc_html($value['count'])  ?></p></div>
                            </div>						 
                        										
                  <?php  } ?>
                  </div><?php
                }
                else
                {
                    ?><h4 class="text-center">NO Items are available!</h4>                  
                    <img class="w-100" src="<?= set_image("no-pokemon") ?>" alt="No Pokemon found"><?php
                }
                ?>
                 
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <?php add_product_url('shop', $product);?>
                    
                    <a class="col-5 p-0 card-links" rel="nofollow" target="_blank" href="<?= $product->get_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -6px;" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg> View</a>
                </div>
            </div>
        </div>
    </div>
    
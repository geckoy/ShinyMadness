<?php 
if (!defined('ABSPATH')) { 
	header("HTTP/1.0 404 Not Found");
	exit; }

// Handle the ajax request here
check_ajax_referer('pokes_search');
//print_r($_POST['search']);
global $wpdb;
global $product;
parse_str($_POST['search']);








$pokes_found_id = array();

if(! validate_num($price_max) || ! validate_num($price_min) || ! validate_num($level_max) || ! validate_num($level_min) || ! validate_num($stardust_max) || ! validate_num($stardust_min)){
    header('HTTP/1.1 500 Enter Valid Number');
    die('What are you doing step bro');
}


$pokes_price_max = $price_max;
$pokes_price_min = $price_min;

$pokes_level_max = $level_max;
$pokes_level_min = $level_min;

$pokes_stardust_max = $stardust_max;
$pokes_stardust_min = $stardust_min;

if($pokemon_shiny == "true") 
{
    $pokemon_shiny = " AND shinycount > 0";
}elseif($pokemon_shiny == "false") {
    $pokemon_shiny = " AND shinycount = 0";
}else{
    $pokemon_shiny = "";
}
 
$pokes_data_search = $wpdb->get_results($wpdb->prepare("SELECT * FROM paa_account_data WHERE price <= %f AND price >= %f AND level <= %d AND level >= %d AND stardust <= %f AND stardust >= %f {$pokemon_shiny} LIMIT 500;",$pokes_price_max,$pokes_price_min ,$pokes_level_max,$pokes_level_min,$pokes_stardust_max,$pokes_stardust_min), ARRAY_A);
// printer($pokes_data_search);
// return ;

if(! $pokes_data_search) 
{
    ?><h1>Nothing Found</h1><?php
    wp_die();
}


foreach($pokes_data_search as $pokes_value) {
    
    $pokes_found_id[] = $pokes_value['product_id'];
    
}


////////////////////////////////////////////////////////// TEST

// $pokes_found_id_string = implode(",",$pokes_found_id);
// $pokemon_name = "%".trim($pokemon_name)."%";
// $pokemon_cp = (!empty(trim($pokemon_cp))) ? $pokemon_cp : "%";
// $pokemon_attack_one = "%".trim($pokemon_attack_one)."%";
// $pokemon_attack_two = "%".trim($pokemon_attack_two)."%";


// $sql_pokemon = "SELECT product_id, id FROM paa_pokemons WHERE product_id IN (".$pokes_found_id_string.")  AND name LIKE %s AND cp LIKE %s AND move1Name LIKE %s AND move2Name LIKE %s;";
// $Advanced_pokemons_product_ids = $wpdb->get_results($wpdb->prepare($sql_pokemon, $pokemon_name,$pokemon_cp,$pokemon_attack_one,$pokemon_attack_two), ARRAY_A);
// printer( $Advanced_pokemons_product_ids );
// echo "end";
// wp_die(); 

//////////////////////////////////////////////////////////\\\\\












$query_search = '';        
$condition_search_stats = ($advanced_search_stats == 'true');
if($condition_search_stats){
   
    $pokes_found_id_string = implode(",",$pokes_found_id);
    $sql_pokemon = "SELECT product_id, id FROM paa_pokemons WHERE product_id IN (".$pokes_found_id_string.")  AND name LIKE %s AND cp LIKE %s AND move1Name LIKE %s AND move2Name LIKE %s;";// 

        if(!validate_name($pokemon_name)) {

            $pokemon_name = "%".trim($pokemon_name)."%";
        }else{
            header('HTTP/1.1 500 Enter Valid Name');
            die();
        }
    
    
        if(!validate_num($pokemon_cp) && !empty($pokemon_cp))
        {
            header('HTTP/1.1 500 Enter Valid number');
            die();
        }
        $pokemon_cp = (!empty(trim($pokemon_cp))) ? $pokemon_cp : "%%";
    
        if (!validate_name($pokemon_attack_one)) {

            $pokemon_attack_one = "%".trim($pokemon_attack_one)."%";
        }else{
            header('HTTP/1.1 500 Enter Valid Name');
            die();
        }
            
    
        if (!validate_name($pokemon_attack_two)) {
            
            $pokemon_attack_two = "%".trim($pokemon_attack_two)."%";
        }else{
            header('HTTP/1.1 500 Enter Valid Name');
            die();
        }
          
    
    
    $Advanced_pokemons_product_ids = $wpdb->get_results($wpdb->prepare($sql_pokemon, $pokemon_name,$pokemon_cp,$pokemon_attack_one,$pokemon_attack_two), ARRAY_A);

    if(! $Advanced_pokemons_product_ids) 
    {
        echo __( '<h1>No products found</h1>' );
        wp_die();
    }



    
    $pokemon_ids = [];
    $pokes_found_id = array();
    foreach($Advanced_pokemons_product_ids as $pokemons_ids_value) 
    {
        if(! in_array($pokemons_ids_value['product_id'], $pokes_found_id))
        {
            $pokes_found_id[] = $pokemons_ids_value['product_id'];
        }
        
            $pokemon_ids[$pokemons_ids_value['product_id']][] = (int)$pokemons_ids_value['id'];
    }
    


    foreach( $pokemon_ids as $key => $value )
    {
        $value_sorted = array_unique($value);
        $pokemon_ids_field[$key] = implode(",",$value_sorted);
    }
    
    $condition_empty_pokemon_field = ($pokemon_name != "%%" || $pokemon_attack_one != "%%" || $pokemon_cp != "%%" || $pokemon_attack_two != "%%");

    if($condition_empty_pokemon_field)
    {
        $query_search = [];

        foreach($pokes_found_id as $value)
        {
            $query_search[$value] = [
                'cache_group'       => 'no-caching',
                'query'             => [
                            'account_data' => [
                                'status' => true,
                            ],
                            'pokemons' 	   => [
                                'status' => true,
                                'limit'  => '09',
                                'orderby'=> "Field(id, ".$pokemon_ids_field[$value].") DESC, isShiny DESC, cp DESC",//, isShiny DESC, cp DESC |  FIELD(id, $pokemon_ids), isShiny DESC, 
                                'custom_name' => "{$pokemon_name}",
                                'custom_cp'   =>"{$pokemon_cp}",
                                'custom_attack_one' =>"{$pokemon_attack_one}",
                                'custom_attack_two' =>"{$pokemon_attack_two}",
                            ],
                        ],
                'selected_pokemons' => ($condition_empty_pokemon_field) ? $pokemon_ids[$value] : ''
            ];
        }
    }
}


?>
<article class="pokes-cards"><?php 
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 40,
        'post__in' => $pokes_found_id,
        'meta_query' 	 => array(
            ['key'     => "_stock_status", 'value'   => "instock", 'compare' => '='],
        ),
        );
    $loop = new WP_Query( $args );
?>
    <h1> Search results :</h1>
    <?php if($condition_search_stats && $condition_empty_pokemon_field) { ?>
        <p>This is the pokemons that match you're criteria</p>
    <?php } ?>
        <div class="row" style="height:auto;background-color:transparent;">
            <?php
            if ( $loop->have_posts() ) {
              
                while ( $loop->have_posts() ) : $loop->the_post();
                    get_template_part( 'template-parts/Product', NULL, $query_search );
                endwhile;
                
            } else {
                echo __( 'No products found' );
            }
            wp_reset_postdata();
            ?>
        </div>
</article>
<?php



wp_die(); // All ajax handlers die when finished
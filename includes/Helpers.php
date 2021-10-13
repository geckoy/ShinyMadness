<?php
    /**
     * transform milliseconds to human readable time 
     */
        function milli_date(int $time)
        {
            $time_fr = date("m/d/Y", $time/1000);
            return "<span class='d-none'>$time</span>".time_elapsed_string($time_fr);
        }

    /**
     * Transform from time to time ago
     */
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }


	function page_and_single_template() 
	{
		if(is_page('cart')){
			return the_content();
		}
		?>
			<header class="entry-header">
				<?php if(has_post_thumbnail()){ ?>
					<div id="post-image"><?php echo the_post_thumbnail();  ?></div>
				<?php } ?>
			</header><!-- .entry-header -->
			<div class="entry-content p-4">
				<?php
				
				the_content();
				
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer float-right">
				<?php the_time(); ?> - <?php the_author(); ?>
			</footer><!-- .entry-footer -->
		<?php
	}

	function journal_template()
	{ ?>
		<header class="entry-header">
				<a class="journal-link" target="_blank" href="<?php the_permalink();?>"><h4><?php the_title(); ?></h4></a>
				<?php if(has_post_thumbnail()){ ?>
					<div class="journal-image"><?php echo the_post_thumbnail();  ?></div>
				<?php } ?>
		</header><!-- .entry-header -->
		<div class="entry-content p-4">
			<?php
			the_excerpt();
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer d-flex flex-row justify-content-end p-2">
			<?php the_category(','); ?>
		</footer><!-- .entry-footer -->
	<?php 
	/* echo '<pre
	print_r(get_posts( ));
	echo '</pre>'; */
	}
    
    /**
     *  Footer information  
     */
        function footer_data()
        { ?>
            <div class="col-lg-3 p-3">
                <ul class="footer-widget" >
                    <li><h4> Pages </h4></li>
                    <li><a href="<?= get_home_url() ?>">Home</a></li>
                    <li><a href="<?= get_site_url( NULL, "faq" ) ?>">FAQ</a></li>
                    <li><a href="<?= get_site_url( NULL, "" ) ?>">About Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3 p-3">
                <ul class="footer-widget">
                    <li><h4> Products </h4></li>
                    <li><a href="<?= get_site_url( NULL, "shop" ) ?>">Shop</a></li>
                    <li><a href="<?= get_site_url( NULL, "sale" ) ?>">Sale</a></li>
                    <li><a href="<?= get_site_url( NULL, "product-category/shiny/?orderby=price" ) ?>">Shiny Accounts</a></li>
                    <li><a href="<?= get_site_url( NULL, "product-category/zero-shiny/?orderby=price" ) ?>">Non Shiny Accounts</a></li>
                    <li><a href="<?= get_site_url( NULL, "product-category/lvl40/?orderby=price" ) ?>">Level 40 Accounts</a></li>
                </ul>
            </div>
            <div class="col-lg-3 p-3 pb-5 pb-lg-4">
                <ul class="footer-widget mb-0">
                    <li class="d-block"><h4> Contact Us </h4></li>
                </ul> 
                <div class="row no-gutters pb-2 footer-widget-socials h-100">
                    <div class="col-6 social d-flex flex-column">
                        <div class="large facebook" onclick="window.open('https://www.facebook.com/ugotfluxxed', '_blank')"><i class="bi bi-facebook"></i></div>
                        <div class="small youtube" onclick="window.open('https://www.youtube.com/channel/UC-ogKOJ506ecfECLVE4Ow8Q', '_blank')"><i class="bi bi-youtube"></i></div>
                        <div class="mid whatsapp" onclick="window.open('https://wa.me/message/SAY53RXX34F7J1', '_blank')"><i class="bi bi-whatsapp"></i></div>
                    </div>
                    <div class="col-6 social d-flex flex-column">
                        <div class="mid discord" onclick="window.open('https://discord.com/invite/shinyquest', '_blank')"><i class="bi bi-discord"></i></div>
                        <div class="large twitter" onclick="window.open('https://twitter.com/shinymadness', '_blank')"><i class="bi bi-twitter"></i></div>
                        <div class="small instagram" onclick="window.open('https://www.instagram.com/shinyquestdiscord/', '_blank')"><i class="bi bi-instagram"></i></div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-3 p-3">
                <ul class="footer-widget">
                    <li><h4> Teams </h4></li>
                    <li><a target="_blank" href="https://github.com/pogo-account-checker/Pogo-Account-Checker/">Pogo Account Checker</a></li>
                </ul>
            </div>
        <?php }
    /**
     * Footer privacy
     */
        function footer_privacy()
        { ?>
            <div class="p-2 privacy-policy-footer"><?= bloginfo("name") ?>® - <a href="<?= site_url( 'privacy-policy' ) ?>">Privacy Policy</a></div>
        <?php }
    /**
     * generate subheader titles name 
     */
        function sub_header_controller() 
        {
            if( is_page() || is_single() ): 
                        if( is_page("shop") || is_page("faq")) {
                            global $pagename;
                            ?>
                            <img src="<?= set_image($pagename) ?> " id="subheaderTitle">
                        <?php }else{ ?>
                            <h1 class="p-3 text-nowrap text-truncate"># <?= get_the_title(); ?><h1>
                        <?php } ?>
            <?php elseif( is_search() ): ?><h2 class="p-4">Search for : <?php echo get_search_query(); ?></h2>
            <?php elseif( is_product_category() ): ?><h2 class="p-4"><?= single_term_title() ?></h2>
            <?php else:?><h2 class="p-4">Results</h2><?php endif;
        }

    /**
     * Generate browser tab names  
     */
        function website_name_tab()
        {
            global $pagename;
           
                if(is_woocommerce())
                {
                    if(is_product())
                    {
                        return bloginfo('name')." - ".get_the_title();
                    }
                    else
                    {
                        global $wp_query;
                        return bloginfo('name')." - ".$wp_query->get_queried_object()->name;
                    }
                }
                else
                {
                    return bloginfo('name')." - ".$pagename;
                }
                
        }

    /**
     * generate template video url
     */
    function set_video(string $name) 
    {
        $registerd_videos = [
            'carousel-front-pageN1' => ['name' => 'pikachu'],
        ];
        $video = $registerd_videos[$name];
        $attachement = wp_get_attachment_by_post_name( $video['name'] );
        if($attachement)
        {
            return wp_get_attachment_url( $attachement->ID );
        }    
        
    }
    /**
     * generate templates images url  
     */
        function set_image(string $name, string $size = "post-thumbnail") 
        {
            $registerd_pictures = [
                'shop_icon' => ['name' => 'pokemonshop_icon'],
                'home_link_icon' => ['name' => 'home_icon'],
                'mobile_menu_image' => ['name' => 'pikachu_running'],
                'faq-icon' => ['name' => 'faq-icon', 'size' => 'faq_icon'],
                'website_tab_icon'=> ['name' => 'shinytarts_icon'],//shinytarts_icon
                'website_logo' => ['name' => 'shinymadnesslogo'/* , 'size' => 'shinytarts_logo' */],//pokemon_logo
                'carousel-front-pageN1' => ['name' => 'pikachu'],
                'carousel-front-pageN2' => ['name' => 'triple-team-wallpaper', 'size' => 'large'],
                'carousel-front-pageN3' => ['name' => 'instinct_wallpaper', 'size' => 'large'],
                'loading_screen_image' => ['name' => 'pikachu_running'],//charizard_flying
                'front_page_illustration' => ['name' => 'hexagon'],
                'front_page_illustration1' => ['name' => 'mew-pika', 'size' => 'front_page_illustrations'],
                'front_page_illustration2' => ['name' => 'pokemon_ball_logo', 'size' => 'front_page_illustrations'],
                'front_page_illustration3' => ['name' => 'stripe-Payment-Logo', 'size' => 'front_page_illustrations'],
                'front-page-before-footer' => ['name' => 'pokemon-go-wallpaper'],
                'subheader'=> ['name' => 'anime-pixel-wallpaper'],
                'no-pokemon' => ['name' => 'zero-pokemon'],
                'fireball' => ['name' => 'fire'],
                'shiny_header_surrounding' => ['name' => 'pokeball-turning'],
                'zero_shiny_header_surrounding' => ['name' => 'fire_torch2'],
                'shiny_header' => ['name' => 'pokemon-dragon-wallpapers'],
                'zero_shiny_header' => ['name' => 'pokemon-mystic-wallpaper'],
                'Shop_tv' => ['name' => 'pokemon-go-4k-wallpaper'],
                'Shop_tv_1' => ['name' => 'instinct_wallpaper'],
                'Shop_tv_2' => ['name' => 'pokemon-go-app'],//pikachu-wallpaper-4k
                'loadingicon' => ['name' => 'search_loading_icon'],
                'stardust_icon' => ['name' =>'stardust'],
                'shiny_icon' => ['name' => 'shiny'], 
                'charizard_wingy' => ['name' => 'charizard'],
                'pokeball' => ['name' => 'pokeball'],
                'pokecoin' => ['name' => 'pokecoin'],
                'shop' => ['name' => 'shop_text'],
                'reviews' => ['name' => 'reviews_text'],
                'faq' => ['name' => 'faq_text'],
                'effect-line' => ['name' => 'gradiant'],
                "read_more_icon" => ['name' => 'plusicon'],
                "main_posts_bg_image" => ['name' =>"pokemongo_all_team_wallpaper", 'size' => 'large'],
                "shape_1" => ['name' =>"shape", 'size' => 'large'],
                "account_details_icon" => ['name' =>"account_details", 'size' => 'pokemon_team_icon'],
                "account_pokemon_icon" => ['name' =>"badge_pikachu", 'size' => 'pokemon_icon_single'],
                "account_items_icon" => ['name' =>"items_storage", 'size' => 'pokemon_icon_single'],
                "account_candy_icon" => ['name' =>"1301", 'size' => 'pokemon_icon_single'],
                "info_container_img_1"=> ['name' =>"faq_text", 'size' => 'large'],
                "info_container_img_2"=> ['name' =>"pokeball-hd", 'size' => 'large'],
                "info_container_img_3"=> ['name' =>"angry-face", 'size' => 'large']

            ];
            $img = $registerd_pictures[$name];
            $attachement = wp_get_attachment_by_post_name( $img['name'] );
            
            if($attachement && preg_match("/image/i", $attachement->post_mime_type))
            {
                if(isset($img['size']))
                {
                    return wp_get_attachment_image_src( $attachement->ID , $img['size'])[0];
                }else
                {
                    return wp_get_attachment_image_src( $attachement->ID, "post-thumbnail" )[0];
                }
            }else
            {
                return 'DATA NOT FOUND :)';
            }
            
        
        }
    /**
     * generate pokemon team image 
     */
        function set_team_image( int $team, string $size = "post-thumbnail" )
        {
            $teams = [
                0 => 'no_team',
                1 => 'team_valor',
                2 => 'team_instinct',
                3 => 'team_mystic'
            ];
            $attachement = wp_get_attachment_by_post_name( $teams[$team] );
            return wp_get_attachment_image_src( $attachement->ID , $size)[0];
        }

    /**
     * retrive the attachment id of the media file
     */
        function wp_get_attachment_by_post_name(string $post_name ) {
            $args           = array(
                'posts_per_page' => 1,
                'post_type'      => 'attachment',
                'name'           => trim( $post_name ),
            );

            $get_attachment = new WP_Query( $args );

            if ( ! $get_attachment || ! isset( $get_attachment->posts, $get_attachment->posts[0] ) ) {
                return false;
            }

            return $get_attachment->posts[0];
        }   
    /**
     * generates item 'pokemon' image url 
     *          @uses : content-single-product.php
     */
        function set_pokemon_item_image( int $item_id, string $size = "post-thumbnail" ) 
        {
            $attachement = wp_get_attachment_by_post_name( $item_id );
            return wp_get_attachment_image_src( $attachement->ID , $size)[0];
        }

    /**
     * generates pokemon image url 
     *          @uses : content-single-product.php
     */
        function set_pokemon_image(int $pokemon_id, bool $shiny, string $size = "post-thumbnail" ) 
        {
            $type = ($shiny === true) ? "_shiny" : "";
            if($pokemon_id < 10) 
            {
                $id = "00".$pokemon_id;
            }elseif($pokemon_id >= 10 && $pokemon_id < 100)
            {
                $id = "0".$pokemon_id;
            }else{
                $id = $pokemon_id;
            }
           
            $pokemon_name = "pokemon_icon_".$id."_00".$type;
            $attachement = wp_get_attachment_by_post_name( $pokemon_name );
            return wp_get_attachment_image_src( $attachement->ID , $size)[0];
        }

    /**
     * generates candy image url 
     *          @uses : content-single-product.php
     */
        function set_pokemon_candy_image() 
        {
            return get_stylesheet_directory_uri()."/images/item/-3.png";
        }

    /**
     * Get current cart products in form of product_id => Cartkey
     *          @uses : Helpers.php
     */
        function cart_products()
        {
            // Loop though cart items
            $cart_items = [];
            $cart_kies = [];
            foreach(WC()->cart->get_cart() as $cart_item ) {
                $cart_items[] = $cart_item['product_id'];
                $cart_kies[$cart_item['product_id']] = $cart_item['key'];
            }
            return [
                    'cart_items' => $cart_items,
                    'cart_kies'  => $cart_kies
                ];
        }

    /**
     * Generate product url and checks if product is in cart or out of stock
     *      @param : $key  specify which template uses the function
     *               $product object of the current product
     *      @uses  : content-single-product.php
     *               product.php
     */
        function add_product_url( string $key, object $product)
        {
            if($product->is_in_stock())
            {?>
                <div <?php if($key == 'shop'){?> class="col-7 p-0 card-links" <?php }elseif($key == 'single'){ ?> class="add_to_cart_single_product" <?php } ?>> <?php
                    if ( ! WC()->cart->is_empty() ) {
                        
                        $cart = cart_products();
                        $cart_items = $cart["cart_items"];
                        $cart_kies = $cart["cart_kies"]; 
                        
                        if(in_array($product->id, $cart_items)) {
                            if($key == 'shop')
                            {?>
                                <button class="submit_cart_url_shiny" status="remove&<?= $cart_kies[$product->id] ?>" value="<?= $product->get_id() ?>">
                                    <img class="add_remove_cart_url_loadingimg" src="<?= set_image("loadingicon") ?>" alt="">
                                    <span class="add_remove_cart_url_text">
                                        <span class="remove_svg"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16"><path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                                        Remove</span>

                                        <span class="add_svg" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16"><path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                                        Add to cart</span>
                                    </span>
                                </button><?php
                            }elseif($key == 'single')
                            {?>
                                <button class="submit_cart_url_shiny" status="remove&<?= $cart_kies[$product->id] ?>" value="<?= $product->get_id() ?>">
                                    <img class="add_remove_cart_url_loadingimg" src="<?= set_image("loadingicon") ?>" alt="">
                                    <span class="add_remove_cart_url_text">
                                        <span class="remove_svg">
                                        Remove</span>

                                        <span class="add_svg" style="display:none;">
                                        Add to cart</span>
                                    </span>
                                </button><?php
                            }
                        }else{
                            add_to_cart_html_shiny( $key, $product);
                        } 
                    }else{ 
                        add_to_cart_html_shiny( $key, $product);
                    }?>
                </div><?php
            }else
            {   if($key == 'shop')
                {
                ?> <span class="col-7 p-0 card-links" style="font-style:italic;color:black;font-weight:bold;">SOLD</span><?php
                }elseif($key == 'single')
                {
                    ?> <span style="font-style:italic;color:white;font-weight:bold;">SOLD</span><?php	
                }	
            }
        }
        function add_to_cart_html_shiny(string $key, object $product)
        {
            if($key == 'shop')
            {?>
                <button class="submit_cart_url_shiny" status="add" value="<?= $product->get_id() ?>">
                    <img class="add_remove_cart_url_loadingimg" src="<?= set_image("loadingicon") ?>" alt="">
                    <span class="add_remove_cart_url_text">
                        <span class="remove_svg" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16"><path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                        Remove</span>

                        <span class="add_svg"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16"><path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                        Add to cart</span>
                    </span>
                </button><?php
            }elseif($key == 'single')
            { ?>
                <button class="submit_cart_url_shiny" status="add" value="<?= $product->get_id() ?>">
                    <img class="add_remove_cart_url_loadingimg" src="<?= set_image("loadingicon") ?>" alt="">
                    <span class="add_remove_cart_url_text">
                        <span class="remove_svg" style="display:none;">
                        Remove</span>

                        <span class="add_svg">
                        Add to cart</span>
                    </span>
                </button><?php
            }
        }
    /**
     * head element for html templates
     */
        function head_tag()
        {?>
            <head>
                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-187283114-1"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());
                    gtag('config', 'UA-187283114-1');
                </script>
                <!-- Fonts -->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
                <!-- Html meta -->
                <meta charset="<?= bloginfo( 'charset' ); ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="keywords" content="Pokemon go, pokemon go,pogo accounts, pogo, pogo account, Pokemon accounts,pokemon accounts,pokemon account,Pokemon account">
                <link rel="shortcut icon" href="<?= set_image('website_tab_icon') ?>" type="image/x-icon">
                <title><?= website_name_tab() ?></title>
                <?php wp_head(); ?>
            </head><?php
        }
    /**
     * NAVBAR links
     */
        function nav_links()
        {?>
                <span class='closebtnmobile d-lg-none'>X</span>
                <marquee direction="right"><img src="<?= set_image("mobile_menu_image") ?>" class="imagemobilenav d-lg-none" style="display: block;margin-left: auto;margin-right: auto;width:45vw;"alt="" srcset=""></marquee>
                <hr style="margin-top:0px;height:5px;border-width:0;color:white;background-color:white" />
            <ul class="navbar-nav ml-lg-auto ">
                <li class="nav-item imagenavlistitem">
                    <a class="nav-link text-white" href="/"><img class="d-none d-lg-block"src="<?= set_image("home_link_icon") ?>" id="Homelogo"><span class="d-block d-lg-none">Home</span></a>
                </li>
                <li class="nav-item imagenavlistitem">
                    <a class="nav-link text-white" href="/shop"><img class="d-none d-lg-block"src="<?= set_image("shop_icon") ?>" id="Shoplogo"><span class="d-block d-lg-none">Shop</span></a>
                </li>
                <li class="nav-item imagenavlistitem">
                    <a class="nav-link text-white" href="/faq"><img class="d-none d-lg-block"src="<?= set_image("faq-icon") ?>" id="faqlogo"><span class="d-block d-lg-none">FAQ</span></a>
                </li>
                <?php
                    // <li class="nav-item imagenavlistitem">
                    //     <a class="nav-link text-white" href="/reviews"><img class="d-none d-lg-block"src="echo get_stylesheet_directory_uri();/images/reviewlogo.png" id="reviewlogo"><span class="d-block d-lg-none">Review</span></a>
                    // </li>
                ?>
                <li class="nav-item imagenavlistitem">
                    <a class="nav-link text-white" rel="nofollow" href="/cart"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top:8px;" width="35" height="35" fill="currentColor" class="bi bi-cart-fill d-none d-lg-block" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg><span class="d-block d-lg-none">Cart</span></a>
                </li>
            </ul><?php
        }
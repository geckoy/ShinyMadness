<?php
/**
 * shinytarts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shinytarts
 */
/*********************************************************************
******************** Indexes *****************************************
**********************************************************************
===============================
~~ Index  ~~  || ~~             Page             ~~
##01          || Helper Functions
##02          || Global
##03          || Ajax scripts
##04          || Woocommerce
##05          || 
##06          || 
##07          || 















***********************************************************************
***********************************************************************
**********************************************************************/
if (!defined('ABSPATH')) { 
	header("HTTP/1.0 404 Not Found");
	exit; }

/************************ Test Area *********************************/
	// add_shortcode('paa', 'paa_shortcode');
	// function paa_shortcode( $atts = [], $content = null) {
		
	// 	// //$content = get_post_status(2595);
	// 	// $post_id = 2607;
	// 	// $product = wc_get_product( $post_id );
	// 	// $post_meta = get_post_meta( $post_id );
	// 	// printer($post_meta);
	// 	// return $content;
	// 	//$content = get_role("shop_manager");
	// 	// $content = get_post_meta("3766");
	// 	// $my_meta_query_args = array(
	// 	// 	'post_type'       	=> 'shop_order',
	// 	// 	'posts_per_page'    => - 1,
	// 	// 	'post_status'    	=> 'any',
	// 	// 	'meta_key' 			=> '_billing_email',
	// 	// 	'meta_value'		=> 'younes.agent@gmail.com',
			
 	// 	// );
	// 	// $my_meta_query = new WP_QUERY($my_meta_query_args);
	// 	// if ( $my_meta_query->have_posts() ) : 
	// 	// 	// Start the Loop 
	// 	// 	$count = 1;
	// 	// 	while ( $my_meta_query->have_posts() ) : 
	// 	// 		$my_meta_query->the_post(); 
	// 	// 		echo $count;
	// 	// 		the_ID();
	// 	// 		the_title(); 
	// 	// 		the_excerpt();
	// 	// 		$count++; 
	// 	// 	// End the Loop 
	// 	// 	endwhile; 
	// 	// else: 
	// 	// // If no posts match this query, output this text. 
	// 	// 	_e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
	// 	// endif; 
		
		
		
		
	// 	printer($content);
	// }
//echo "<h1>".$pagename."</h1>";













####02#################################################################
						/* theme Helper Functions */
#######################################################################
	
	require_once 'includes/Helpers.php';
	
	
####02#################################################################
						/* Global */
#######################################################################
	
	/* if ( ! defined( '_S_VERSION' ) ) {
		// Replace the version number of the theme on each release.
		define( '_S_VERSION', '1.0.0' );
	} */

	if ( ! function_exists( 'shinytarts_setup' ) ) :
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		function shinytarts_setup() {
			
			/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
			// add_theme_support( 'title-tag' );

			/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
			add_theme_support( 'post-thumbnails' );

			
			// This theme uses wp_nav_menu() in one location.
			/* register_nav_menus(
				array(
					'menu-1' => esc_html__( 'Primary', 'shinytarts' ),
				)
			); */

			/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'style',
					'script',
				)
			);

			

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );


			// Add theme support for WooCommerce template overrides
			add_theme_support( 'woocommerce' );

			/**
			 * images sizes
			 */
			add_image_size("pokemon_team_icon", 100, 100);

			add_image_size("pokemon_icon", 101, 40);
			add_image_size("pokemon_icon_single", 50, 41);

			add_image_size("faq_icon", 100, 100);

			add_image_size("shinytarts_logo", 210, 75);

			add_image_size("front_page_illustrations", 160, 160);	
			
		}
	endif;
	add_action( 'after_setup_theme', 'shinytarts_setup' );


	

	/**
	 * Enqueue scripts and styles.
	 */
	function shinytarts_scripts() {
		
		/* Bootstrap scripts */
			/* Latest compiled and minified CSS */
				wp_enqueue_style("Bootstrap4","https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css");
			/* Popper JS */
				wp_enqueue_script( "BootPopperjs", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js");
			/* Latest compiled JavaScript */
				wp_enqueue_script( "BootJs", "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js");
			/* Bootstrap Icons */
				wp_enqueue_style( "BootIcon", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
		
		/* Own Css */
		wp_enqueue_style( 'shinytarts-style', get_stylesheet_uri());
		
		/* Flickity */
			if(is_front_page() || is_page('shop') ) :
				wp_enqueue_style("FlickityCss",get_stylesheet_directory_uri()."/assets/flickity/flickity.css");
				wp_enqueue_script("FlickityJs", get_stylesheet_directory_uri()."/assets/flickity/flickity.pkgd.js", array('jquery'), false,  true );
			/* Own scripts For front */
				wp_enqueue_script( 'shinytarts-script-Frontpage', get_stylesheet_directory_uri().'/assets/Js/scriptsFrontpage.js', array('jquery'), false,  true );
			endif;

		/* Opentip */
		wp_enqueue_style("OpentipCss",get_stylesheet_directory_uri()."/assets/opentip/opentip.css");
		wp_enqueue_script("OpentipJs", get_stylesheet_directory_uri()."/assets/opentip/opentip-jquery.js", array('jquery'), false,  true );

		/* Own scripts */
			wp_enqueue_script( 'shinytarts-script', get_stylesheet_directory_uri().'/assets/Js/scripts.js', array('jquery'), false,  true );

		/* Own scripts */
		wp_enqueue_script( 'shinytarts-script', get_stylesheet_directory_uri().'/assets/tooltipster/tooltipster.main.min.js', array('jquery'), false,  true );
		
		


		// wp_style_add_data( 'shinytarts-style', 'rtl', 'replace' );

		// wp_enqueue_script( 'shinytarts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if(is_woocommerce()){
			wp_enqueue_style("Loading-bar-css", get_stylesheet_directory_uri() . "/assets/loading/loading-bar.css");
			wp_enqueue_script("Loading-bar-js", get_stylesheet_directory_uri() . "/assets/loading/loading-bar.js", array(), false, true );
		
			wp_enqueue_style( 'DataTableCSS', get_stylesheet_directory_uri() . '/assets/datatable/datatables.css', array(), false, 'all' );
			wp_enqueue_script( 'DataTableJS', get_stylesheet_directory_uri() . '/assets/datatable/datatables.min.js', array( 'jquery' ), false, false );
			wp_enqueue_style( 'DataTableCSS-responsive', get_stylesheet_directory_uri() . '/assets/datatable/Responsive-2.2.7/css/responsive.dataTables.css', array(), false, 'all' );
			wp_enqueue_script( 'DataTableJS-responsive', get_stylesheet_directory_uri() . '/assets/datatable/Responsive-2.2.7/js/dataTables.responsive.js', array( 'jquery' ), false, false );
		}
	}
	add_action( 'wp_enqueue_scripts', 'shinytarts_scripts' );


	

	add_action('wp_footer','enqueue_script_footer');
	function enqueue_script_footer() {
		require_once get_template_directory() . '/assets/Js/footer-scripts.php';
	}
	
	add_action('wp_head','enqueue_styles_header');
	function enqueue_styles_header() {
		require_once get_template_directory() . '/assets/Css/header-styles.php';
	}

/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	/* function shinytarts_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'shinytarts' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'shinytarts' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
	add_action( 'widgets_init', 'shinytarts_widgets_init' ); */

/**
	 * Customizer additions.
	 */
	// require get_template_directory() . '/inc/customizer.php';

	/**
	 * Load Jetpack compatibility file.
	 */
	/* if ( defined( 'JETPACK__VERSION' ) ) {
		require get_template_directory() . '/inc/jetpack.php';
	} */


####03#################################################################
						/* Ajax scripts */
#######################################################################

/**
 * Shinytarts Ajax search script
 */
	
	function pokes_enqueue( $hook ) {
		/* if ( 'myplugin_settings.php' !== $hook ) {
			return;
		} */
		wp_enqueue_script(
			'ajax-pokes',
			get_stylesheet_directory_uri()."/assets/Js/ajaxScripts/pokes-ajax.js",
			array( 'jquery' ),
			false,
			true
		);
		$pokes_nonce = wp_create_nonce( 'pokes_search' );
		wp_localize_script(
			'ajax-pokes',
			'pokes_ajax_obj',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => $pokes_nonce,
			)
		);
	}
	
	/**
	 * Handles my AJAX request for filter products.
	 */
	function pokes_ajax_handler() {
		require get_template_directory() . '/template-parts/Product-filter-ajax.php';
	}

	add_action( 'wp_enqueue_scripts', 'pokes_enqueue' );
	add_action( 'wp_ajax_nopriv_ajax_pokes', 'pokes_ajax_handler' );



/**
 * Shinytarts Ajax Add to cart
 */
	
function add_to_cart_enqueue( $hook ) {
	/* if ( 'myplugin_settings.php' !== $hook ) {
		return;
	} */
	wp_enqueue_script(
		'ajax-add_to_cart',
		get_stylesheet_directory_uri()."/assets/Js/ajaxScripts/add_to_cart-ajax.js",
		array( 'jquery' ),
		false,
		true
	);
	$add_to_cart_nonce = wp_create_nonce( 'add_to_cart_ajax' );
	wp_localize_script(
		'ajax-add_to_cart',
		'add_to_cart_ajax_obj',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => $add_to_cart_nonce,
		)
	);
}

/**
 * Handles my AJAX request for filter products.
 */
function add_to_cart_ajax_handler() {
	require get_template_directory() . '/template-parts/add_to_cart-ajax.php';
}

add_action( 'wp_enqueue_scripts', 'add_to_cart_enqueue' );
add_action( 'wp_ajax_nopriv_ajax-add_to_cart', 'add_to_cart_ajax_handler' );






/**
 * Shinytarts Ajax Send Accounts data
 */
	
function ajax_accounts_enqueue( $hook ) {
	/* if ( 'myplugin_settings.php' !== $hook ) {
		return;
	} */
	wp_enqueue_script(
		'ajax-accounts-send',
		get_stylesheet_directory_uri()."/assets/Js/ajaxScripts/accounts-send-ajax.js",
		array( 'jquery' ),
		false,
		true
	);
	$accounts_send_nonce = wp_create_nonce( 'accounts-send' );
	wp_localize_script(
		'ajax-accounts-send',
		'accounts_send_ajax_obj',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => $accounts_send_nonce,
		)
	);
}

/**
 * Handles my AJAX request for filter products.
 */
function ajax_accounts_handler() {
	require get_template_directory() . '/template-parts/Customer-send-accounts.php';
}

add_action( 'wp_enqueue_scripts', 'ajax_accounts_enqueue' );
add_action( 'wp_ajax_nopriv_ajax-accounts-send', 'ajax_accounts_handler' );
	


	

####04#################################################################
						/* Woocommerce */
#######################################################################

	function my_woocommerce_catalog_orderby( $orderby ) {
		unset($orderby["popularity"]);
		unset($orderby["menu_order"]);
		unset($orderby["rating"]);
		unset($orderby["date"]);
		return $orderby;
	}
	add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );

  


	add_action( 'woocommerce_thankyou', 'resend_order_goodies');
	function resend_order_goodies( $order_id )
	{
		$order = wc_get_order($order_id);
		if(! $order) return;
		if( $order->is_paid() )
		{
			?>
				<form id="accountsSend">
					<label style="display:block;" for="order_id">Didn't recieve your account? Retry</label>
					<input type="hidden" name="order_id" value="<?= $order_id ?>">
					<input type="submit" value="Resend Accounts">
				</form>
			<?php
		}else
		{ ?>
			<h4>Payment Needed!!, Contact Customer service</h4>	
		  <?php
		}
	}

	
	add_filter('woocommerce_order_item_quantity_html',function( $item_qty )
	{ 
		$item_qty = '';
		return $item_qty;
	});
	add_action('woocommerce_order_item_meta_start',function( $item_id, $item){
		global $wpdb;
		$product = $item->get_product();
		$product_data = $wpdb->get_row('SELECT * FROM paa_account_data WHERE product_id ='.$product->id.';', OBJECT);
		?> - <span> LEVEL <?= $product_data->level ?></span><?php
	}, 10, 2 );

	add_filter("woocommerce_order_item_permalink", function( $permalink, $item, $order )
	{
		$product = $item->get_product();
		$product_link = $product->get_permalink();
		$permalink = $product_link;
		return  $permalink;
	}, 10, 3);
	
	add_filter("woocommerce_order_item_name", function( $product_name, $item)
	{
		$product = $item->get_product();
		$product_name = '<a target="_blank" href="'.$product->get_permalink().'">'.$product->get_name().'</a>';
		return $product_name;
	},10, 2);
	
	add_filter( 'jetpack_remove_login_form', '__return_true' );
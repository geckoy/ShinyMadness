<?php
/**
 * The template Index file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();

	if( is_product_category() ) get_template_part("template-parts/filter_bar");
?>

    <div id="main-posts" class="container-xl">

		
		<?php woocommerce_content(); ?>
		

	</div><!-- #main -->	

<?php
get_footer();



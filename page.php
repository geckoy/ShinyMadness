<?php
/**
 * The template file For pages
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

?>

	<!-- <div id="screener"></div> -->
	<?php
	if( is_page( 'shop' ) )
	{
			
		get_template_part("template-parts/filter_bar");
		get_template_part("template-parts/Product","shop");

	}elseif( is_page( 'faq' ) ){
	?>
		
		<div id="main-posts" class="container-xl">
			<h1 style="color:#007be3;">Frequently Asked Question</h1>
			<br>
		 	<?php get_template_part('template-parts/content','faq') ?>
		</div>	
	<?php
	} else
	{ ?>
		<div id="main-posts" class="container">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			 ?></div><!-- .container --><?php
	}
	?>

<?php get_sidebar(); ?>

<?php
get_footer();













/* <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dolorum a distinctio voluptates. Cupiditate labore repudiandae mollitia iusto nulla. Doloribus iste illum, facilis sint ex harum! Commodi unde natus recusandae.</p>
 */
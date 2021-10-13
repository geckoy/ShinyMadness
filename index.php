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
?>

    <div id="main-posts" class="container">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if(! is_search())
				{
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
				}else{
					get_template_part( 'template-parts/content', 'search' );
				}
			endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div><!-- #main -->	

<?php
get_footer();

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

global $post;
if( is_page() ){ $post_classes = ['ptype-page']; }elseif( is_single() ){ $post_classes = ['ptype-post']; }
?>

<article <?php post_class($post_classes); ?>>
	<?php 
	/**
	 * @Function: page_and_single_template() / path: function.php IN global functions
	 */
		if( !is_single() && !is_page() ){ 
			// journal_template();
			
			the_content();
			?>
			<span style="position:absolute;bottom: 10%;right:10%;"> <?php the_author(); ?>  - <?php the_time(); ?></span>		
			<?
		}else{
			// page_and_single_template();
			if ( has_post_thumbnail() ) { ?>
				<img src="<?= the_post_thumbnail_url(); ?>" style="margin-bottom:40px;min-width:100%;height:300px;object-fit:cover;"alt="<?= the_title() ?>"> <?php
			} 
			the_content();

			if(!is_checkout() && !is_cart())
			{
			?>
			<span style="position:absolute;bottom: 10%;right:10%;"> <?php the_author(); ?>  - <?php the_time(); ?></span>		
			<?
			}
		}
	?>
</article>

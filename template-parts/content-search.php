<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

global $post;
//wc_get_product
?>
<?php if($post->post_name == 'my-account' || $post->post_name == 'cart' || $post->post_name == 'checkout' || $post->post_type == "product") return; ?>

        <div class="card serach_article" >
            <img src="<?= the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?= the_title() ?>">
            <div class="card-body">
                <h1 class="card-title"><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h1>
                <p class="card-text"><?= get_the_excerpt() ?></p>
                
            </div>
            <div class="card-footer text-right">
                <?php the_author() ?> - <?php the_time("l j F Y h:i A") ?> 
            </div>
        </div>

<hr class="search_article_hr">
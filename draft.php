<?php 
if($product->is_in_stock())
            {
                if ( ! WC()->cart->is_empty() ) {
                    
                    $cart = cart_products();
                    $cart_items = $cart["cart_items"];
                    $cart_kies = $cart["cart_kies"]; 
                    
                    if(in_array($product->id, $cart_items)) {
                        if($key == 'shop')
                        {?>
                            <a class="col-7 p-0 card-links" href="<?= WC()->cart->get_remove_url($cart_kies[$product->id])?>">
                            <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16"><path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                            Remove</a><?php
                        }elseif($key == 'single')
                        {?>
                            <a class="add_to_cart_single_product" href="<?= WC()->cart->get_remove_url($cart_kies[$product->get_id()])?>">
                            Remove</a><?php
                        }
                    }else{
                        if($key == 'shop')
                        {?>
                            <a class="col-7 p-0 card-links" href="<?= $product->add_to_cart_url()?>">
                            <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16"><path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                            Add to cart</a><?php
                        }elseif($key == 'single')
                        {?>
                            <a class="add_to_cart_single_product" href="<?= $product->add_to_cart_url() ?>">
                            Add to cart</a><?php
                        }
                    } 
                }else{ 
                    if($key == 'shop')
                    {?>
                        <a class="col-7 p-0 card-links" href="<?= $product->add_to_cart_url()?>">
                        <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -4px;" width="25" height="25" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16"><path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                        Add to cart</a><?php
                    }elseif($key == 'single')
                    { ?>
                        <a class="add_to_cart_single_product" href="<?= $product->add_to_cart_url() ?>">
                        Add to cart</a><?php
                    }
                }
            }else
            {   if($key == 'shop')
                {
                ?> <span class="col-7 p-0 card-links" style="font-style:italic;color:black;font-weight:bold;">SOLD</span><?php
                }elseif($key == 'single')
                {
                    ?> <span style="font-style:italic;color:white;font-weight:bold;">SOLD</span><?php	
                }	
            }


            ?>

<article class="serach_article">

<h1><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h1>
<img style="width:100%;height:200px;object-fit:cover;" src="<?= the_post_thumbnail_url(); ?>" alt="<?= the_title() ?>">
<?= the_excerpt() ?>
</article>


<div class="col-lg-4 p-3">
                <ul class="footer-widget" >
                    <li>E-mail : </li>
                    <li><a rel="nofollow" style="font-weight:bold;color:#fec803;" href="mailto:mail@pogofarmersguild.store">mail@pogofarmersguild.store</a></li>
                </ul>
            </div>
            <div class="col-lg-4 p-3">
                <ul class="footer-widget">
                    <li>Visit Our Facebook page:</li>
                    <li><a rel="nofollow" style="font-weight:bold;color:#fec803;" href="https://www.facebook.com/groups/shinytarts/" target="_blank">https://www.facebook.com/groups/shinytarts</a></li>
                </ul>
            </div>
            <div class="col-lg-4 p-3">
                <ul class="footer-widget">
                    <li>Join Our Discord page:</li>
                    <li><a rel="nofollow" style="font-weight:bold;color:#fec803;" href="https://discord.gg/DqX4teeDD9" target="_blank" rel="noopener noreferrer">https://discord.gg/DqX4teeDD9</a></li>
                </ul>
            </div>
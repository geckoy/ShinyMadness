<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 */

get_header("Frontpage");
?>

    <!-- Second Layer -->
        <div class="underslider" style="border-top: solid rgb(48, 52, 54) 3px;background-image: url('<?= set_image("front_page_illustration") ?>');">
            <div class="container">
                <div class="row justify-content-lg-center pr-5 pl-5 boxesunderslider">
                    <div class="col-lg-4"><div class="boxunderslide"><img src="<?= set_image("front_page_illustration1") ?>" class="imagesinbox" alt=""><h4 class="boxesheaders noselect">Instant Delivery</h4><p class="boxestext noselect">As soon as payment submitted, you'll receive Login details of the accounts within 5 minutes! </p></div></div>
                    <div class="col-lg-4"><div class="boxunderslide"><img src="<?= set_image("front_page_illustration2") ?>" class="imagesinbox" alt=""><h4 class="boxesheaders noselect">Accounts</h4><p class="boxestext noselect">Choose your favourite accounts from our Pokemon Go Accounts collection!</p></div></div>
                    <div class="col-lg-4"><div class="boxunderslide"><img src="<?= set_image("front_page_illustration3") ?>" class="imagesinbox" alt=""><h4 class="boxesheaders noselect">Secure Payments</h4><p class="boxestext noselect">Your payments are secure with our stripe payments!</p></div></div>
                </div>
            </div>
        </div>
    <!-- Third Layer -->
        <div class="parallax" style="background-image: url('<?= set_image("front-page-before-footer") ?>"></div>
        
        
        <?php get_sidebar(); ?>
        	
<?php

get_footer();





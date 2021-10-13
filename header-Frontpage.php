<?php
/**
 * The header for our Front page theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <?php head_tag() ?>
<body <?php body_class(array('bodycontroloverflowhidden')); ?>>
<?php wp_body_open(); ?>
<div id="body">
    <!-- Loading screen -->
    <div class="loaderscrn"><img src="<?= set_image("loading_screen_image") ?>" alt="Loading"><p>Loading <span class="bounce1">.</span><span class="bounce2">.</span><span class="bounce3">.</span></p></div>
        
    <!-- First Layer -->
    <div class="navwrapper" >

        <nav id="navbarfirst" class="navbar fixed-top navbar-expand-lg navbar-dark" >

            <div class="container ">

                <a class="navbar-brand text-white" href="#logo">
                    <img src="<?= set_image("website_logo") ?>" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse" id="collapsibleNavbar">
                <?php nav_links() ?>
                </div>
            </div>
        </nav>


        <div class="main-carousel" id="carousel">
            <div class="carousel-cell">
                <div class="carousellItems" style="background-image: url(<?= set_image("carousel-front-pageN1") ?>);">
                   
                    <video class="carousels_videos" id="video_cell_0" autoplay loop muted>
                        <source src="<?= set_video("carousel-front-pageN1") ?>" type="video/mp4">
                    </video>
                    <!-- <img src="<?= set_image("carousel-front-pageN1") ?>" class="fontImage" alt=""> -->
                    <div class='carouseltext' id="cell0">
                            <div class='carouseltexttransboxhidden'>
                                <h1 class="carouseltextheaderhidden">Buy Account Now with instant delivery!</h1>
                            </div>
                            <a class="carouseltextbtnhidden" href="<?= site_url( 'shop' )?>">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="carousellItems"  style="background-image: url(<?= set_image("carousel-front-pageN2") ?>);">
                    <!-- <img src="<?= set_image("carousel-front-pageN2") ?>" class="fontImage" alt=""> -->
                    
                    <div class='carouseltext' id="cell1">
                            <div class='carouseltexttransboxhidden'>
                                <h1 class="carouseltextheaderhidden">Got a question? Don't hesitate Contact Us!</h1>
                            </div>
                            <a class="carouseltextbtnhidden" onclick="$crisp.push(['do', 'chat:open'])">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="carousellItems"  style="background-image: url(<?= set_image("carousel-front-pageN3") ?>);">
                    <!-- <img src="<?= set_image("carousel-front-pageN3") ?>" class="fontImage" alt=""> -->
                    
                    <div class='carouseltext' id="cell2">
                            <div class='carouseltexttransboxhidden'>
                                <h1 class="carouseltextheaderhidden">You're New ? Check our FAQ page!</h1>
                            </div>
                            <a class="carouseltextbtnhidden" href="<?= site_url( 'faq' )?>">FAQ</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="socialiconsholder"><i class="facebooklogo bi bi-facebook"></i></div> -->
    </div>





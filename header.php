<?php
/**
 * The header for our theme
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
	<header class="site-header">
		<!-- Loading screen -->
        <div class="loaderscrn"><img src="<?= set_image("loading_screen_image") ?>" alt="Loading"><p>Loading <span class="bounce1">.</span><span class="bounce2">.</span><span class="bounce3">.</span></p></div>
        
        <!-- First Layer -->
       
                    <nav id="navbarfirst" style="background-color:black;" class="navbar navbar-expand-lg navbar-dark" >

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
                <!-- Moving line -->
                    <hr class="slash-1">
                <!-- subheader -->
                <div class="subheader" style="background-image:url('<?= set_image('subheader') ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php 
                                    /**
                                     * @Function: sub_header_controller() path: functions.php IN Helpers function
                                     */
                                    sub_header_controller();
                                ?>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block"></div>
                        </div>
                    </div>
                </div>
    </header><!-- #masthead -->
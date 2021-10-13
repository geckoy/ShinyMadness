<?php
/**
 * The template for displaying the footer for Front page
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
    <footer id="footer">       
        <!-- Fourth Layer -->
            <div <?php if(is_front_page()){?> style="border-top:none;"<?php }?>>
                <div class="container">
                    <div class="row">
                        <?php footer_data() ?>
                    </div>    
                </div>
            </div>
        <!-- Footer Layer -->
        <?php footer_privacy() ?>                 
    </footer>
</div><!-- #body -->

<?php wp_footer(); ?>

</body>
</html>
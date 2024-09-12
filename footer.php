<?php wp_footer();

?>


<div class="p28-footer p28-bg-dark">



    <footer>
        <?php wp_nav_menu(array(

            'menu'       => 'footer_menu',

            'menu_class' => 'p28-footer-item p28-txt-15071d'

        ));

        ?><span class="p28-small-text"><?php echo get_bloginfo('name'); ?> &copy; <?php echo date("Y"); ?></span>

    </footer>

</div>
<div class="spacer"></div>
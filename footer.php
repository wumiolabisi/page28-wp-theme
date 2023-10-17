<?php wp_footer();
?><div class="p28-footer">
    <footer><?php wp_nav_menu(array(
                'menu'       => 'footer_menu',
                'menu_class' => 'p28-footer-item'
            ));
            ?><span class="p28-bloginfo"><?php echo get_bloginfo('name'); ?> &copy; <?php echo date("Y"); ?></span>
    </footer>
</div>
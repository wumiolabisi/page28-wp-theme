<?php
/* Afficher une page */

get_header(); ?>
<div class="p28-container">


        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <h1 class="p28-txtcenter"><?php the_title(); ?></h1>

                        <div class="p28-block"> <?php the_content(); ?></div>


        <?php endwhile;
        endif; ?>
</div>

<?php get_footer(); ?>
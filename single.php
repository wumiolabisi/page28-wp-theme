<?php

/* Afficher un article */

get_header(); ?>
<div class="p28-container">

    <h1><?php the_title(); ?></h1>
    <div class="p28-block"><?php the_content(); ?></div>
</div>
<?php get_footer(); ?>
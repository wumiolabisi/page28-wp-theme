<?php

/* Afficher un article */

get_header(); ?>
<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row">
            <div class="p28-col">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="p28-row p28-justify-center p28-gap-row p28-margin" id="p28-single-oeuvre">
            <div class="p28-col">
                <?php the_content(); ?></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
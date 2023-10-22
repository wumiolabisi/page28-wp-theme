<?php

/* Afficher une fiche oeuvre type.
*/

get_header(); ?>

<div class="p28-container">


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            if (get_field('date_de_sortie')) : $date_sortie = get_field('date_de_sortie');
            endif;
            $terms = wp_get_post_terms($post->ID);
            var_dump($terms);


            ?>
            <div class="p28-archive-banner">

                <?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-bannerbg-img']); ?>
                <div class="p28-bannerbg-item">
                    <h1 class="p28-h1 p28-txt-cbbdff p28-txtcenter"><?php the_title(); ?></h1>
                    <?php if (the_excerpt()) : ?>
                        <div class="p28-block">
                            <p class="p28-txt-cbbdff p28-txtcenter"><?php get_the_excerpt(); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="p28-content">
                <div class="p28-infos">
                    <div class="p28-infos-item p28-bg-cbbdff">
                        <p class="p28-h2">DATE DE SORTIE :</p>
                        <p><?php echo $date_sortie; ?></p>
                    </div>
                    <div class="p28-infos-item p28-bg-cbbdff">
                        <p class="p28-h2">R&Eacute;ALISATRICE(S) :</p>
                        <p></p>
                    </div>
                    <div class="p28-infos-item p28-bg-cbbdff">
                        <p class="p28-h2">SC&Eacute;NARISTE(S) :</p>
                        <p></p>
                    </div>
                    <div class="p28-infos-item p28-bg-cbbdff">
                        <p class="p28-h2">PRODUCTRICE(S) :</p>
                        <p></p>
                    </div>
                </div>
                <div class="p28-txt-cbbdff p28-txtjustify-left"><?php the_content(); ?></div>
            </div>

    <?php
        endwhile;
    endif;

    ?>
    <div class="p28-comments">
        <?php
        if (have_comments()) :
            comments_template();
        endif;

        comment_form(); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>
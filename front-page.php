<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>

<div class="p28-container">
    <div class="p28-pinnedpost p28-bg-15071d">
        <div class="p28-pinnedpost-left p28-pad2025">
            <h1 class="p28-txt-cbbdff">LE TITRE</h1>
            <p class="p28-txt-cbbdff">Blablabla</p>
            <a class="p28-btn p28-btn-primary">TEST BOUTON</a>
        </div>
        <div class="p28-flexrowend p28-angled-right p28-bg-15071d">
            <div class="p28-bar p28-bg-fec32e"></div>
            <div class="p28-bar p28-bg-cbbdff"></div>
        </div>
        <div class="p28-pinnedpost-right">
            <img class="p28-imgfull" src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" />
        </div>
    </div>

</div>

<?php
$args  = array(
    'post_type'           => 'oeuvres',
    'posts_per_page'      => 1
);
$query = new WP_Query($args);

// 3. On lance la boucle !
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

        the_title();
        the_excerpt();
        the_post_thumbnail(); ?>
        <p>
            <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
        </p>
<?php
    endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
?>
<?php get_footer(); ?>
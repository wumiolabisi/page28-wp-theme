<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>
<?php
$args  = array(
    'posts_per_page'      => 1,
    'post__in'            => get_option('sticky_posts'),
    'ignore_sticky_posts' => 1,
);
$query = new WP_Query($args); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></h2>

            <?php the_post_thumbnail(); ?>

            <p class="post__meta">
                Publié le <?php the_time(get_option('date_format')); ?>
                par <?php the_author(); ?> • <?php comments_number(); ?>
            </p>

            <?php the_excerpt(); ?>

            <p>
                <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
            </p>
        </article>

<?php endwhile;
endif;  ?>

<?php get_footer(); ?>
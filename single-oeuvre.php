<?php

/* 
* Afficher une fiche oeuvre type.
*/

get_header();
?>


<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row">
            <div class="p28-col">
                <h1 class="p28-text-center-md"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="p28-row">
            <div class="p28-col width-100pc">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-img-banner']); ?>
            </div>
        </div>
        <div class="p28-row p28-justify-center p28-gap-row p28-margin" id="p28-single-oeuvre">
            <div class="p28-col p28-fr2">
                <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-thumbnail-small" alt="affiche du film : <?php the_title(); ?>" />
                <div id="p28-infos-oeuvre">
                    <?php
                    $p28_post_taxonomies = get_post_taxonomies($post->ID);
                    $p28_terms  = wp_get_post_terms($post->ID, $p28_post_taxonomies);

                    /*
                   *  Pour récupérer les infos dans les variables qu'on a créé
                   *  On boucle sur les terms et on vérifie si le term correspond à ce qu'on recherche
                   *  On range chaque term dans le tableau associé
                   */

                    foreach ($p28_terms as $terms) :

                        $current_taxonomy = $terms->taxonomy;
                        $current_name = $terms->name;

                        if ($current_taxonomy == 'format') :
                            $format = array(
                                "term" => $current_name,
                                "term_link" => get_term_link($terms)
                            );
                        elseif ($current_taxonomy == 'etiquette') :
                            $etiquette = array(
                                "term" => $current_name,
                                "term_link" => get_term_link($terms)
                            );
                        elseif ($current_taxonomy == 'genre') :
                            $genre = array(
                                "term" => $current_name,
                                "term_link" => get_term_link($terms)
                            );
                        else :
                            echo '<p>' . get_taxonomy($current_taxonomy)->labels->name . '<br><a href="' . get_term_link($terms) . '" title="Voir plus de ' . $current_name . '">' . $current_name . '</a></p>';
                        endif;

                    endforeach; ?>

                </div>
            </div>
            <div class="p28-col p28-fr1" id="p28-oeuvre-content">
                <div>
                    <h2 class="p28-text-center-md">RÉSUMÉ</h2>
                    <?php the_excerpt(); ?>
                </div>
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row">
            <div class="p28-col width-100pc">
                <h2 class="p28-txt-15071d p28-h2 p28-txtcenter">Découvrez les avis des internautes sur cette &oelig;uvre</h2>
            </div>
        </div>
        <div class="p28-row">
            <div class="p28-col">
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template('/comments.php');
                endif; ?>
            </div>
        </div>
        <div class="p28-row">
            <div class="p28-col">
                <div class="p28-comments">
                    <?php
                    comment_form();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
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
                    /* On récupère le champ ACF duree pour cette oeuvre */
                    if (get_field('duree') != null) :
                        echo '<p>Durée<br>' . get_field('duree') . '</p>';
                    endif; ?>
                    <?php
                    /* On récupère le champ ACF date_de_sortie pour cette oeuvre */
                    if (get_field('date_de_sortie') != null) :
                        echo '<p>Année<br>' . get_field('date_de_sortie') . '</p>';
                    endif; ?>
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
                        elseif ($current_taxonomy == 'tag') :
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

                    <?php
                    /* On récupère le champ ACF pays pour cette oeuvre */
                    $acf_pays = get_field('pays', $post->ID);

                    if ($acf_pays != null) :
                        echo '<p>Pays/Langue<br>';
                        foreach ($acf_pays as $pays) :
                            echo get_field_object('pays', $post->ID)['choices'][$pays];
                            if ($pays != end($acf_pays)) :
                                echo ', ';
                            endif;
                        endforeach;
                        echo '</p>';
                    endif; ?>
                </div>
            </div>
            <div class="p28-col p28-fr1" id="p28-oeuvre-content">
                <div class="p28-badges">
                    <?php if (isset($format)) : ?>
                        <div class="p28-badge-item">
                            <a href="<?php echo $format['term_link']; ?>" title="Voir plus d'oeuvres correspondant à <?php echo $format['term']; ?>" alt="Voir plus d'oeuvres correspondant à <?php echo $format['term']; ?>"><?php echo $format['term']; ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($genre)) : ?>
                        <div class="p28-badge-item">
                            <a href="<?php echo $genre['term_link']; ?>" title="Voir plus d'oeuvres correspondant à <?php echo $genre['term']; ?>" alt="Voir plus d'oeuvres correspondant à <?php echo $genre['term']; ?>"><?php echo $genre['term']; ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($etiquette)) : ?>
                        <div class="p28-badge-item">
                            <a href="<?php echo $etiquette['term_link']; ?>" title="Voir plus d'oeuvres correspondant à <?php echo $etiquette['term']; ?>" alt="Voir plus d'oeuvres correspondant à <?php echo $etiquette['term']; ?>"><?php echo $etiquette['term']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <h2>RÉSUMÉ</h2>
                    <?php the_excerpt(); ?>
                </div>
                <?php if (!empty(the_content())) : ?>

                    <p class="p28-h2">En savoir plus sur l'&oelig;uvre</p>
                    <div id="p28-oeuvre-content-scroll">
                        <?php the_content(); ?>
                    </div>

                <?php endif; ?>

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
            <div class="p28-col width-100pc">
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template('/comments.php');
                endif; ?>
            </div>
        </div>
        <div class="p28-row">
            <div class="p28-col width-100pc">
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
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
                    $formats = [];
                    $genres = [];
                    $etiquettes = [];
                    $p28_post_taxonomies = get_post_taxonomies($post->ID);

                    foreach ($p28_post_taxonomies as $tax) :

                        $p28_terms = get_the_terms($post->ID, $tax);

                        if ($p28_terms != false) :

                            if ($tax != 'format' && $tax != 'genre' && $tax != 'etiquette') :
                                echo '<p>' . $tax . '<br>';
                                foreach ($p28_terms as $terms) :
                                    echo '<a href="' . get_term_link($terms->term_id) . '" title="Voir plus de ' . $terms->name . '">' . $terms->name . '</a>';
                                    if ($terms != end($p28_terms)) :
                                        echo ', ';
                                    endif;
                                endforeach;
                                echo '</p>';
                            else:
                                foreach ($p28_terms as $terms) :
                                    if ($tax == 'format'):
                                        array_push($formats, $terms->name);
                                    elseif ($tax == 'etiquette'):
                                        array_push($etiquettes, $terms->name);
                                    elseif ($tax == 'genre'):
                                        array_push($genres, $terms->name);
                                    endif;
                                endforeach;
                            endif;

                        endif;

                    endforeach;
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
                    <?php if ($formats != null) : ?>
                        <?php foreach ($formats as $f) : ?>
                            <div class="p28-badge-item">
                                <a href="<?php echo get_term_link(get_term(get_term_by('name', $f, 'format')->term_id)); ?>" title="Voir plus d'oeuvres correspondant à <?php echo $f; ?>" alt="Voir plus d'oeuvres correspondant à <?php echo $f; ?>"><?php echo $f; ?></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($genres != null) : ?>
                        <?php foreach ($genres as $g) : ?>
                            <div class="p28-badge-item">
                                <a href="<?php echo get_term_link(get_term_by('name', $g, 'genre')->term_id); ?>" title="Voir plus d'oeuvres correspondant à <?php echo $g; ?>" alt="Voir plus d'oeuvres correspondant à <?php echo $g; ?>"><?php echo $g; ?></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($etiquettes != null) : ?>
                        <?php foreach ($etiquettes as $t) : ?>
                            <div class="p28-badge-item">
                                <a href="<?php echo get_term_link(get_term_by('name', $t, 'etiquette')->term_id); ?>" title="Voir plus d'oeuvres correspondant à <?php echo $t; ?>" alt="Voir plus d'oeuvres correspondant à <?php echo $t; ?>"><?php echo $t; ?></a>
                            </div>
                        <?php endforeach; ?>
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


<?php if (comments_open() || get_comments_number()) : ?>
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
                    comments_template('/comments.php');
                    ?>
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
<?php endif; ?>
<?php get_footer(); ?>
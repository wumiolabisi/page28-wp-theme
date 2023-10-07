<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>


<div class="p28-container">
    <?php

    $p28_sticky_post = [];
    $args  = array(
        'post_type'           => 'oeuvre',
        'posts_per_page'      => 2,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'meta_key'            => 'sticky_custom_post',
        'meta_value'          => 1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();


            if ($query->current_post == 0) { ?>
                <div class="p28-pinnedpost p28-bg-15071d">
                    <div class="p28-pinnedpost-left">
                        <h1 class="p28-txt-cbbdff p28-h1"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                        <div class="p28-bannerexcerpt p28-txt-cbbdff"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA FICHE</a>

                    </div>
                    <div class="p28-flexrowend p28-angled-right p28-bg-15071d">
                        <div class="p28-bar p28-bg-fec32e"></div>
                        <div class="p28-bar p28-bg-cbbdff"></div>
                    </div>
                    <div class="p28-pinnedpost-right">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-imgfull']); ?></a>
                    </div>
                </div>



    <?php
            } else if ($query->current_post == 1) {

                $p28_sticky_post = [
                    'p28_permalink' => get_the_permalink(),
                    'p28_excerpt'   => get_the_excerpt(),
                    'p28_title'     => get_the_title(),
                    'p28_thumbnail' => get_the_post_thumbnail(the_ID(), 'post-thumbnail', ['class' => 'p28-imgfull'])
                ];
            }
        endwhile;
    endif;

    wp_reset_postdata();

    ?>
    <!-- BLOC SEO -->
    <div class="p28-txtbloc p28-txtcenter">
        <h2 class="p28-h2 p28-txt-cbbdff">
            Découvrez notre sélection de films 100% réalisés par des femmes
        </h2>
        <p class="p28-txt-cbbdff">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
    </div>

    <!-- DIV DEBUT CATALOGUE-->
    <div class="p28-catalogue">
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-catalogue-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-catalogue-img" /></div>
        <div class="p28-alginselfcenter"><a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA SÉLECTION</a></div>
    </div>

    <!-- DIV ZOOM REAL -->
    <div class="p28-focusreal">
        <h2 class="p28-h2 p28-txt-15071d">
            Focus sur Céline Schiamma
        </h2>

        <div class="p28-focusreal-item p28-bg-15071d">

            <p class="p28-txt-cbbdff">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
            <div class="p28-filmsreal">
                <div class="p28-filmsreal-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-filmsreal-img" />
                    <div class="p28-mar-20 p28-txtcenter"><a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA SÉLECTION</a></div>
                </div>
                <div class="p28-filmsreal-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-filmsreal-img" />
                    <div class="p28-mar-20 p28-txtcenter"><a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA SÉLECTION</a></div>
                </div>
                <div class="p28-filmsreal-item"><img src="http://localhost/page28-local/wp-content/uploads/2023/09/portrait-de-la-jeune-fille-en-feu-ou-comment-regarder-autrement1-759x500-1.jpg" class="p28-filmsreal-img" />
                    <div class="p28-mar-20 p28-txtcenter"><a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA SÉLECTION</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- SECOND STICKY POST -->

    <div class="p28-pinnedpost p28-bg-15071d">
        <div class="p28-pinnedpost-left">
            <h1 class="p28-txt-cbbdff p28-h1"><a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" title="<?php echo $p28_sticky_post['p28_title']; ?>"><?php echo $p28_sticky_post['p28_title']; ?></a></h1>
            <div class="p28-bannerexcerpt p28-txt-cbbdff"><?php echo $p28_sticky_post['p28_excerpt']; ?></div>
            <a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" class="p28-btn p28-btn-primary">VOIR LA FICHE</a>

        </div>
        <div class="p28-flexrowend p28-angled-right p28-bg-15071d">
            <div class="p28-bar p28-bg-fec32e"></div>
            <div class="p28-bar p28-bg-cbbdff"></div>
        </div>
        <div class="p28-pinnedpost-right">
            <a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" title="<?php echo $p28_sticky_post['p28_title']; ?>"><?php echo $p28_sticky_post['p28_thumbnail']; ?></a>
        </div>
    </div>





</div>
<?php get_footer(); ?>
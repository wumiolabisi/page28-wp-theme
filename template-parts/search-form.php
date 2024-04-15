<?php $p28_taxonomies = get_taxonomies(array(
    '_builtin' => false,

), $output = 'objects');
?>
<div class="p28-searcharea">
    <form class="p28-searchform" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
        <div class="p28-searchform-content">

            <?php
            foreach ($p28_taxonomies as $taxonomy) :
                $p28_search_terms = get_terms($taxonomy->name);

            ?>
                <?php if (!($taxonomy->name == "realisation") && !($taxonomy->name == "production") && !($taxonomy->name == "scenario")) : ?>
                    <div class="p28-filter">
                        <label><?php echo $taxonomy->label; ?></label>
                        <?php if ($taxonomy->name == 'format') : ?>
                            <div class="p28-filter-radio">
                                <?php foreach ($p28_search_terms as $terms) : ?>
                                    <label for="<?php echo $terms->name; ?>"><?php echo $terms->name; ?>
                                        <input type="radio" id="<?php echo $terms->name; ?>" name="format-oeuvre" value="<?php echo $terms->name; ?>" />
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <select name="<?php echo $taxonomy->name; ?>" id="<?php echo $taxonomy->name; ?>-select">
                                <option value="" disabled selected>Sélectionnez</option>
                                <?php foreach ($p28_search_terms as $terms) : ?>
                                    <option value="<?php echo $terms->name; ?>"><?php echo $terms->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php

            endforeach;
            ?>
            <div class="p28-filter">
                <input type="hidden" name="posttype" value="oeuvre">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('p28_search_oeuvre'); ?>">
                <input type="hidden" name="action" value="p28_search_oeuvre">
                <button class="p28-btn p28-btn-primary">
                    Filtrer
                </button>
            </div>
            <div class="p28-filter" id="p28-reload">
                <span class="p28-svginteract" title="Réinitialiser les filtres" onclick="window.location.reload();">
                    <svg class="p28-20 p28-fill-15071d" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M35.3 12.7c-2.89-2.9-6.88-4.7-11.3-4.7-8.84 0-15.98 7.16-15.98 16s7.14 16 15.98 16c7.45 0 13.69-5.1 15.46-12h-4.16c-1.65 4.66-6.07 8-11.3 8-6.63 0-12-5.37-12-12s5.37-12 12-12c3.31 0 6.28 1.38 8.45 3.55l-6.45 6.45h14v-14l-4.7 4.7z" />
                        <path d="M0 0h48v48h-48z" fill="none" />
                    </svg></span>
            </div>
        </div>
    </form>

</div>
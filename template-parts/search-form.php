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
        </div>
    </form>

</div>
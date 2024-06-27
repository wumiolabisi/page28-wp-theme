<div class="p28-grid-item ici-section" id="p28-grid-tag-item-<?php echo the_ID(); ?>">
    <div class="p28-grid-item-content">
        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
            <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-thumbnail" alt="affiche du film : <?php the_title(); ?>" />
        </a>
    </div>
</div>
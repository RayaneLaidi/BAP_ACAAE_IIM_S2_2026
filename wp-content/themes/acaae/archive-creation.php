<?php get_header(); ?>

<!-- ═══ HERO 3 PANNEAUX ═════════════════════════════════════════════ -->
<div class="hero-panels">

    <div class="hero-panel">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-adherents.png" alt="Adhérents" />
        <div class="hero-panel-content">
            <h2>Adhérents</h2>
            <a href="<?php echo get_post_type_archive_link('adherent'); ?>" class="btn-hero">Voir les adhérents</a>
        </div>
        <span class="hero-panel-label">Adhérents</span>
    </div>

    <div class="hero-panel">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-creations.png" alt="Créations" />
        <div class="hero-panel-content">
            <h2>Créations</h2>
            <a href="<?php echo get_post_type_archive_link('creation'); ?>" class="btn-hero">Voir les créations</a>
        </div>
        <span class="hero-panel-label">Créations</span>
    </div>

    <div class="hero-panel">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-metiers.png" alt="Métiers" />
        <div class="hero-panel-content">
            <h2>Métiers</h2>
            <a href="<?php echo get_post_type_archive_link('metier'); ?>" class="btn-hero">Voir les métiers</a>
        </div>
        <span class="hero-panel-label">Métiers</span>
    </div>

</div>

<!-- ═══ TITRE ════════════════════════════════════════════════════════ -->
<div class="archive-header">
    <h1>Créations</h1>
</div>

<!-- ═══ GRILLE MASONRY ══════════════════════════════════════════════ -->
<div class="creations-archive">

    <?php if (have_posts()) : ?>

        <div class="creations-liste">

            <?php
            $i = 0;
            while (have_posts()) : the_post();
                $nom_creation   = get_field('nom_creation');
                $auteur         = get_field('auteur');
                $metier         = get_field('metier');
                $image_creation = get_field('image_creation');
                $i++;
                $size_class = ($i % 5 === 1 || $i % 5 === 4) ? 'creation-card--tall' : '';
            ?>

                <div class="creation-card <?php echo $size_class; ?>">

                    <?php if ($image_creation) : ?>
                        <img src="<?php echo esc_url($image_creation['url']); ?>"
                             alt="<?php echo esc_attr($image_creation['alt']); ?>" />
                    <?php endif; ?>

                    <div class="creation-overlay">
                        <?php if ($nom_creation) : ?>
                            <h3><?php echo esc_html($nom_creation); ?></h3>
                        <?php endif; ?>
                        <?php if ($auteur) : ?>
                            <span class="creation-auteur"><?php echo esc_html($auteur); ?></span>
                        <?php endif; ?>
                        <?php if ($metier) : ?>
                            <span class="creation-metier-label"><?php echo esc_html($metier); ?></span>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="btn-profil">Voir la création</a>
                    </div>

                </div>

            <?php endwhile; ?>

        </div>

        <?php
        global $wp_query;
        if ($wp_query->max_num_pages > 1) : ?>
            <div class="voir-plus-wrap">
                <a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn-voir-plus">
                    Voir plus de créations
                </a>
            </div>
        <?php endif; ?>

        <div class="pagination">
            <?php the_posts_pagination(array('mid_size' => 2)); ?>
        </div>

    <?php else : ?>
        <p class="no-results">Aucune création trouvée.</p>
    <?php endif; ?>

</div>
<?php get_footer(); ?>
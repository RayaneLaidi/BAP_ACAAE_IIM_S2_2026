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
            <h2>Portraits &amp; Créations</h2>
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
    <h1>Adhérents</h1>
</div>

<!-- ═══ GRILLE ══════════════════════════════════════════════════════ -->
<div class="adherents-archive">

    <?php if (have_posts()) : ?>

        <div class="adherents-liste">

            <?php while (have_posts()) : the_post();
                $nom_adherent    = get_field('nom_adherent');
                $prenom_adherent = get_field('prenom_adherent');
                $metier          = get_field('metier');
                $image_adherent  = get_field('image_adherent');
            ?>

                <div class="adherent-card">

                    <?php if ($image_adherent) : ?>
                        <img src="<?php echo esc_url($image_adherent); ?>"
                             alt="<?php echo esc_attr($prenom_adherent . ' ' . $nom_adherent); ?>" />
                    <?php endif; ?>

                    <div class="adherent-overlay">
                        <h3><?php echo esc_html($prenom_adherent . ' ' . $nom_adherent); ?></h3>
                        <?php if ($metier) : ?>
                            <span class="metier-label"><?php echo esc_html($metier); ?></span>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="btn-profil">Voir le profil</a>
                    </div>

                </div>

            <?php endwhile; ?>

        </div>

        <?php
        global $wp_query;
        if ($wp_query->max_num_pages > 1) : ?>
            <div class="voir-plus-wrap">
                <a href="<?php echo next_posts($wp_query->max_num_pages, false); ?>" class="btn-voir-plus">
                    Voir plus d'adhérents
                </a>
            </div>
        <?php endif; ?>

        <div class="pagination">
            <?php the_posts_pagination(array('mid_size' => 2)); ?>
        </div>

    <?php else : ?>
        <p class="no-results">Aucun adhérent trouvé.</p>
    <?php endif; ?>

</div>



<?php get_footer(); ?>
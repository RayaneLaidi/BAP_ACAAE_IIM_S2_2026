<?php get_header(); ?>

<div class="metiers-archive">

    <h1>Tous les métiers</h1>

    <?php if (have_posts()) : ?>

        <div class="metiers-liste">

            <?php while (have_posts()) : the_post(); ?>

                <?php
                $nom_metier         = get_field('nom_metier');
                $description_metier = get_field('description_metier');
                $image_metier       = get_field('image_metier');
                ?>

                <div class="metier-card">

                    <?php if ($image_metier) : ?>
                        <img src="<?php echo esc_url($image_metier['url']); ?>"
                             alt="<?php echo esc_attr($image_metier['alt']); ?>" />
                    <?php endif; ?>

                    <?php if ($nom_metier) : ?>
                        <h2>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo esc_html($nom_metier); ?>
                            </a>
                        </h2>
                    <?php endif; ?>

                    <?php if ($description_metier) : ?>
                        <p><?php echo nl2br(esc_html($description_metier)); ?></p>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>">Voir le métier</a>

                </div>

            <?php endwhile; ?>

        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>

        <p>Aucun métier trouvé.</p>

    <?php endif; ?>

</div>

<?php get_footer(); ?>
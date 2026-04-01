<?php get_header(); ?>

<div class="creation-single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $nom_creation         = get_field('nom_creation');
        $auteur               = get_field('auteur');
        $metier               = get_field('metier');
        $image_creation       = get_field('image_creation');
        $date_creation        = get_field('date_creation');
        $description_creation = get_field('description_creation');
        ?>

        <?php if ($image_creation) : ?>
            <img src="<?php echo esc_url($image_creation['url']); ?>"
                 alt="<?php echo esc_attr($image_creation['alt']); ?>" />
        <?php endif; ?>

        <?php if ($nom_creation) : ?>
            <h2><?php echo esc_html($nom_creation); ?></h2>
        <?php endif; ?>

        <?php if ($auteur) : ?>
            <p><strong>Auteur :</strong> <?php echo esc_html($auteur); ?></p>
        <?php endif; ?>

        <?php if ($metier) : ?>
            <p><strong>Métier :</strong> <?php echo esc_html($metier); ?></p>
        <?php endif; ?>

        <?php if ($date_creation) : ?>
            <p><strong>Date :</strong> <?php echo esc_html($date_creation); ?></p>
        <?php endif; ?>

        <?php if ($description_creation) : ?>
            <div><?php echo nl2br(esc_html($description_creation)); ?></div>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
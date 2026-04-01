<?php get_header(); ?>

<div class="salons-container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $nom_salon         = get_field('nom_salon');
        $lieu_salon        = get_field('lieu_salon');
        $date_debut_salon  = get_field('date_debut_salon');
        $date_fin_salon    = get_field('date_fin_salon');
        $image_salon       = get_field('image_salon');
        $description_salon = get_field('description_salon');
        ?>

        <?php if ($nom_salon) : ?>
            <h2><?php echo esc_html($nom_salon); ?></h2>
        <?php endif; ?>

        <?php if ($lieu_salon) : ?>
            <p><?php echo esc_html($lieu_salon); ?></p>
        <?php endif; ?>

        <?php if ($date_debut_salon) : ?>
            <p><?php echo esc_html($date_debut_salon); ?></p>
        <?php endif; ?>

        <?php if ($date_fin_salon) : ?>
            <p><?php echo esc_html($date_fin_salon); ?></p>
        <?php endif; ?>

        <?php if ($image_salon) : ?>
            <img src="<?php echo esc_url($image_salon); ?>"
                 alt="<?php echo esc_attr($nom_salon); ?>" />
        <?php endif; ?>

        <?php if ($description_salon) : ?>
            <div><?php echo nl2br(esc_html($description_salon)); ?></div>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="metier-single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $nom_metier         = get_field('nom_metier');
        $description_metier = get_field('description_metier');
        $image_metier       = get_field('image_metier');
        ?>

        <?php if ($image_metier) : ?>
            <img src="<?php echo esc_url($image_metier['url']); ?>"
                 alt="<?php echo esc_attr($image_metier['alt']); ?>" />
        <?php endif; ?>

        <?php if ($nom_metier) : ?>
            <h2><?php echo esc_html($nom_metier); ?></h2>
        <?php endif; ?>

        <?php if ($description_metier) : ?>
            <div><?php echo nl2br(esc_html($description_metier)); ?></div>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
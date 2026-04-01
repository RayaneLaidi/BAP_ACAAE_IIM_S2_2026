<?php get_header(); ?>

<div class="adherent-single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $nom_adherent      = get_field('nom_adherent');
        $prenom_adherent   = get_field('prenom_adherent');
        $metier            = get_field('metier');
        $email_adherent    = get_field('email_adherent');
        $numero_telephone  = get_field('numero_telephone');
        $image_adherent    = get_field('image_adherent');
        $description_adherent = get_field('description_adherent');
        ?>

        <?php if ($image_adherent) : ?>
            <img src="<?php echo esc_url($image_adherent); ?>"
                 alt="<?php echo esc_attr($prenom_adherent . ' ' . $nom_adherent); ?>" />
        <?php endif; ?>

        <?php if ($prenom_adherent || $nom_adherent) : ?>
            <h2><?php echo esc_html($prenom_adherent . ' ' . $nom_adherent); ?></h2>
        <?php endif; ?>

        <?php if ($metier) : ?>
            <p><strong>Métier :</strong> <?php echo esc_html($metier); ?></p>
        <?php endif; ?>

        <?php if ($email_adherent) : ?>
            <p><strong>Email :</strong>
                <a href="mailto:<?php echo esc_attr($email_adherent); ?>">
                    <?php echo esc_html($email_adherent); ?>
                </a>
            </p>
        <?php endif; ?>

        <?php if ($numero_telephone) : ?>
            <p><strong>Téléphone :</strong>
                <a href="tel:<?php echo esc_attr($numero_telephone); ?>">
                    <?php echo esc_html($numero_telephone); ?>
                </a>
            </p>
        <?php endif; ?>

        <?php if ($description_adherent) : ?>
            <div><?php echo nl2br(esc_html($description_adherent)); ?></div>
        <?php endif; ?>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
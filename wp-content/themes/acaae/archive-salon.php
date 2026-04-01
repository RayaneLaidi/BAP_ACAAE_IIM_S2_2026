<?php get_header(); ?>

<div class="salons-archive-container">

  <!-- HERO 1 : image pleine hauteur avec titre -->
  <section class="hero-top" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/salons.png');">
    <div class="hero-top__overlay">
      <h1>SALONS<br>D'EXPOSITIONS</h1>
    </div>
  </section>

  <!-- HERO 2 : image entièrement assombrie + tagline -->
  <section class="hero-bottom" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/salonn.png');">
    <div class="hero-bottom__overlay">
      <p class="hero-bottom__tagline">VENEZ À LA RENCONTRE DE NOS<br>ARTISANS ET DÉCOUVREZ LEURS<br>DERNIÈRES CRÉATIONS.</p>
    </div>
  </section>

  <!-- SÉPARATEUR DORÉ -->
  <div class="section-divider"></div>

  <!-- LISTE DES SALONS -->
  <main class="salons-content">
    <div class="content-wrapper">

      <h2 class="section-title">SALONS À VENIR</h2>

      <?php if ( have_posts() ) : ?>
        <div class="salons-liste">
          <?php while ( have_posts() ) : the_post();
            $nom_salon         = get_field('nom_salon');
            $image_salon       = get_field('image_salon');
            $description_salon = get_field('description_salon');
            $date_debut        = get_field('date_debut_salon');
          ?>
          <article class="salon-card">
            <a href="<?php the_permalink(); ?>" class="salon-card__link" aria-label="Voir <?php echo esc_attr($nom_salon); ?>"></a>
            <div class="salon-img-container">
              <?php if ( $image_salon ) : ?>
                <img src="<?php echo esc_url($image_salon); ?>" alt="<?php echo esc_attr($nom_salon); ?>">
              <?php endif; ?>
            </div>
            <div class="salon-details">
              <h3><?php echo esc_html($nom_salon); ?></h3>
              <p class="salon-excerpt"><?php echo esc_html($description_salon); ?></p>
              <p class="salon-date">
                <span class="salon-date__icon" aria-hidden="true"></span>
                <?php echo esc_html($date_debut); ?>
              </p>
            </div>
          </article>
          <?php endwhile; ?>
        </div>

        <div class="pagination">
          <?php echo paginate_links(); ?>
        </div>

      <?php else : ?>
        <p class="no-salons">Aucun salon trouvé.</p>
      <?php endif; ?>

    </div>
  </main>

  <!-- FOOTER CTA -->
  <section class="cta-banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/salons.png');">
    <div class="cta-banner__overlay">
      <p class="cta-banner__text">VOUS SOUHAITEZ EN SAVOIR PLUS SUR<br>UN CRÉATEUR OU UN ÉVÉNEMENT ?<br>N'HÉSITEZ PAS À NOUS CONTACTER.</p>
    </div>
  </section>

</div>

<?php get_footer(); ?>
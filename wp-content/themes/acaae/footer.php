<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acaae
 */

?>

<?php
/**
 * Footer Template
 * Champs ACF sur le post type custom "footer" (slug: footer).
 *
 * Pour activer le debug : mettre WP_DEBUG à true dans wp-config.php
 * OU passer ?footer_debug=1 dans l'URL (admin uniquement).
 */

$footer_debug = ( defined('WP_DEBUG') && WP_DEBUG && is_user_logged_in() )
             || ( isset($_GET['footer_debug']) && is_user_logged_in() );

// ── Récupération du post footer ──────────────────────────────────────────────
$footer_query = new WP_Query([
    'post_type'              => 'footer',
    'posts_per_page'         => 1,
    'post_status'            => 'publish',
    'no_found_rows'          => true,
    'update_post_meta_cache' => true,
    'update_post_term_cache' => false,
]);

$footer_id = $footer_query->have_posts()
    ? $footer_query->posts[0]->ID
    : null;

// ── Debug ────────────────────────────────────────────────────────────────────
if ( $footer_debug ) {
    echo '<div style="background:#1e2120;color:#f2c832;padding:1.5rem;font-family:monospace;font-size:13px;z-index:9999;position:relative">';
    echo '<strong>[ FOOTER DEBUG ]</strong><br>';
    echo 'footer_id trouvé : ' . ( $footer_id ? $footer_id : '❌ AUCUN POST TROUVÉ' ) . '<br>';
    if ( $footer_id ) {
        echo 'Champs ACF : <pre style="color:#faf4e8">';
        print_r( get_fields( $footer_id ) );
        echo '</pre>';
    }
    echo '</div>';
}

// ── Sortie propre si pas de post ─────────────────────────────────────────────
if ( ! $footer_id ) {
    wp_footer();
    echo '</body></html>';
    return;
}

// ── Récupération des champs ACF ──────────────────────────────────────────────
$titre_newsletter  = get_field( 'titre_newsletter',       $footer_id );
$desc_newsletter   = get_field( 'description_newsletter', $footer_id );
$titre_mail        = get_field( 'titre_mail',             $footer_id );
$email_placeholder = get_field( 'email',                  $footer_id );
$bouton_abonne     = get_field( 'bouton_abonne',          $footer_id );
$titre_mail_2      = get_field( 'titre_mail_2',           $footer_id );
$grande_image      = get_field( 'grande_image',           $footer_id );
$logo_complet      = get_field( 'logo_complet',           $footer_id );
$nav_accueil       = get_field( 'accueil',                $footer_id );
// Le nom ACF contient un & littéral — get_post_meta() lit directement la BDD
$nav_portrait = get_post_meta( $footer_id, 'portrait&creation', true );
if ( ! $nav_portrait ) {
    $nav_portrait = get_post_meta( $footer_id, 'portrait&amp;creation', true );
}
$nav_apropos       = get_field( 'a_propos',               $footer_id );
$nav_salons        = get_field( 'salons',                 $footer_id );
$nav_rejoindre     = get_field( 'nous_rejoindre',         $footer_id );
$mentions_legales  = get_field( 'mentions_legales',       $footer_id );
$vector_1          = get_field( 'vector_1',               $footer_id );
$vector_2          = get_field( 'vector_2',               $footer_id );
?>

<footer class="site-footer" role="contentinfo">

    <!-- Vecteurs décoratifs -->
    <?php if ( $vector_1 ) : ?>
        <div class="footer__vector footer__vector--1" aria-hidden="true">
            <img src="<?php echo esc_url( $vector_1['url'] ); ?>" alt="" />
        </div>
    <?php endif; ?>

    <?php if ( $vector_2 ) : ?>
        <div class="footer__vector footer__vector--2" aria-hidden="true">
            <img src="<?php echo esc_url( $vector_2['url'] ); ?>" alt="" />
        </div>
    <?php endif; ?>

    <!-- Grande image de fond -->
    <?php if ( $grande_image ) : ?>
        <div class="footer__bg-image" aria-hidden="true">
            <img
                src="<?php echo esc_url( $grande_image['url'] ); ?>"
                alt="<?php echo esc_attr( $grande_image['alt'] ); ?>"
            />
        </div>
    <?php endif; ?>

    <div class="footer__inner">

        <!-- ── TOP : Logo · Navigation · Newsletter ────────────────── -->
        <div class="footer__top">

            <!-- Logo -->
            <div class="footer__brand">
                <?php if ( $logo_complet ) : ?>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="footer__logo-link">
                        <img
                            src="<?php echo esc_url( $logo_complet['url'] ); ?>"
                            alt="<?php echo esc_attr( $logo_complet['alt'] ); ?>"
                            class="footer__logo"
                        />
                    </a>
                <?php endif; ?>
            </div>

            <!-- Navigation -->
            <nav class="footer__nav" aria-label="Navigation footer">
                <ul class="footer__nav-list">

                    <?php if ( $nav_accueil ) : ?>
                        <li>
                            <a href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php echo esc_html( $nav_accueil ); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ( $nav_portrait ) : ?>
                        <li>
                            <a href="<?php echo esc_url( home_url('/creation') ); ?>">
                                <?php echo esc_html( $nav_portrait ); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ( $nav_apropos ) : ?>
                        <li>
                            <a href="<?php echo esc_url( home_url('/a-propos') ); ?>">
                                <?php echo esc_html( $nav_apropos ); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ( $nav_salons ) : ?>
                        <li>
                            <a href="<?php echo esc_url( home_url('/salon') ); ?>">
                                <?php echo esc_html( $nav_salons ); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ( $nav_rejoindre ) : ?>
                        <li>
                            <a href="<?php echo esc_url( home_url('/nous-rejoindre') ); ?>">
                                <?php echo esc_html( $nav_rejoindre ); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>

            <!-- Newsletter -->
            <div class="footer__newsletter">

                <?php if ( $titre_newsletter ) : ?>
                    <h2 class="footer__newsletter-title">
                        <?php echo esc_html( $titre_newsletter ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $desc_newsletter ) : ?>
                    <p class="footer__newsletter-desc">
                        <?php echo esc_html( $desc_newsletter ); ?>
                    </p>
                <?php endif; ?>

                <form
                    class="footer__newsletter-form"
                    action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
                    method="POST"
                    novalidate
                >
                    <input type="hidden" name="action" value="newsletter_subscribe" />
                    <?php wp_nonce_field( 'newsletter_subscribe', 'newsletter_nonce' ); ?>

                    <?php if ( $titre_mail ) : ?>
                        <label for="footer-email" class="footer__newsletter-label">
                            <?php echo esc_html( $titre_mail ); ?>
                        </label>
                    <?php endif; ?>

                    <div class="footer__newsletter-row">
                        <input
                            type="email"
                            id="footer-email"
                            name="subscriber_email"
                            class="footer__newsletter-input"
                            placeholder="<?php echo esc_attr( $email_placeholder ?: 'votre@email.com' ); ?>"
                            required
                            aria-required="true"
                        />
                        <button type="submit" class="footer__newsletter-btn">
                            <?php echo esc_html( $bouton_abonne ?: "S'abonner" ); ?>
                        </button>
                    </div>

                    <?php if ( $titre_mail_2 ) : ?>
                        <p class="footer__newsletter-note">
                            <?php echo esc_html( $titre_mail_2 ); ?>
                        </p>
                    <?php endif; ?>

                </form>

            </div><!-- /.footer__newsletter -->

        </div><!-- /.footer__top -->

        <!-- ── BOTTOM : Copyright · Mentions légales ───────────────── -->
        <div class="footer__bottom">

            <p class="footer__copyright">
                &copy; <?php echo esc_html( date('Y') ); ?>
                <?php bloginfo('name'); ?>
            </p>

            <?php if ( $mentions_legales ) : ?>
                <a
                    href="<?php echo esc_url( home_url('/mentions-legales') ); ?>"
                    class="footer__mentions"
                >
                    <?php echo esc_html( $mentions_legales ); ?>
                </a>
            <?php endif; ?>

        </div><!-- /.footer__bottom -->

    </div><!-- /.footer__inner -->

</footer>

<?php wp_footer(); ?>
</body>
</html>
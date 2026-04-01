<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acaae
 */

?>
<?php
/**
 * The header for our theme
 *
 * @package acaae
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$header_post = get_posts([
    'post_type'      => 'header',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
]);
$header_id = ! empty( $header_post ) ? $header_post[0]->ID : null;

// Récupération des champs de navigation
$menu_1 = $header_id ? get_field( 'menu_1', $header_id ) : null;
$menu_2 = $header_id ? get_field( 'menu_2', $header_id ) : null;
$menu_3 = $header_id ? get_field( 'menu_3', $header_id ) : null;
$menu_4 = $header_id ? get_field( 'menu_4', $header_id ) : null;

/**
 * Correspondance label → slug de page
 * Adapte les slugs si tes pages ont des URLs différentes.
 */
$nav_slugs = [
    'accueil'            => home_url('/'),
    'portrait'           => home_url('/creation'),
    'portrait&creation'  => home_url('/creation'),
    'portrait création'  => home_url('/creation'),
    'salons'             => home_url('/salon'),
    'a propos'           => home_url('/a-propos'),
    'à propos'           => home_url('/a-propos'),
    'a_propos'           => home_url('/a-propos'),
    'nous rejoindre'     => home_url('/nous-rejoindre'),
    'nous_rejoindre'     => home_url('/nous-rejoindre'),
    'contact'            => home_url('/contact'),
];

/**
 * Retourne l'URL correspondant au label du menu.
 * Cherche d'abord une correspondance exacte (insensible à la casse),
 * puis une correspondance partielle.
 */
function get_nav_url( $label, $slugs ) {
    if ( ! $label ) return home_url('/');
    $label_clean = strtolower( trim( $label ) );

    // Correspondance exacte
    if ( isset( $slugs[ $label_clean ] ) ) {
        return $slugs[ $label_clean ];
    }

    // Correspondance partielle
    foreach ( $slugs as $key => $url ) {
        if ( strpos( $label_clean, $key ) !== false || strpos( $key, $label_clean ) !== false ) {
            return $url;
        }
    }

    // Fallback : on génère un slug depuis le label
    return home_url('/' . sanitize_title( $label ) );
}
?>

<header class="site-header">
  <div class="header-inner">

    <!-- LOGO -->
    <div class="header-logo">
      <?php $logo = $header_id ? get_field( 'logo_header', $header_id ) : null; ?>
      <?php if ( $logo ) : ?>
        <a href="<?php echo esc_url( home_url('/') ); ?>">
          <img
            src="<?php echo esc_url( $logo['url'] ); ?>"
            alt="<?php echo esc_attr( $logo['alt'] ); ?>"
            class="logo-img"
          />
        </a>
      <?php endif; ?>
    </div>

    <!-- NAVIGATION -->
    <nav class="header-nav" aria-label="Navigation principale">
      <ul class="nav-list">

        <?php if ( $menu_1 ) : ?>
          <li>
            <a href="<?php echo esc_url( get_nav_url( $menu_1, $nav_slugs ) ); ?>" class="nav-link">
              <?php echo esc_html( $menu_1 ); ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if ( $menu_2 ) : ?>
          <li>
            <a href="<?php echo esc_url( get_nav_url( $menu_2, $nav_slugs ) ); ?>" class="nav-link">
              <?php echo esc_html( $menu_2 ); ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if ( $menu_3 ) : ?>
          <li>
            <a href="<?php echo esc_url( get_nav_url( $menu_3, $nav_slugs ) ); ?>" class="nav-link">
              <?php echo esc_html( $menu_3 ); ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if ( $menu_4 ) : ?>
          <li>
            <a href="<?php echo esc_url( get_nav_url( $menu_4, $nav_slugs ) ); ?>" class="nav-cta">
              <?php echo esc_html( $menu_4 ); ?>
            </a>
          </li>
        <?php endif; ?>

      </ul>
    </nav>

  </div>
</header>
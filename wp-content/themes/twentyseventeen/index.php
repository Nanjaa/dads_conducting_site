<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php
wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<?php  ?>
<body id="landing-body" <?php body_class();?> style="background-image:url(<?php the_field('landing_page_background', 2); ?>);">
<div class="left-fade"></div>
<div id="page" class="site">
	<header id="landing-header-wrap" role="banner">
		<nav id="landing-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
			<i class="material-icons close-navigation no-desktop">clear</i>
			<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
				<?php
				echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
				echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
				_e( 'Menu', 'twentyseventeen' );
				?>
			</button>

			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
			) ); ?>
		</nav><!-- #site-navigation -->

		<div class="landing-header">
			<h1 class="banner-title"><?php bloginfo( 'name' ); ?></h1>
			<div class="red-underline"></div>
			<?php $description = get_bloginfo( 'description', 'display' ); ?>
			<p class="banner-subtitle"><?php echo $description; ?></p>
		</div><!-- .landing-header -->

		<i class="material-icons open-navigation no-desktop">menu</i>

	</header><!-- #masthead -->
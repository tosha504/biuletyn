<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package realestate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="wrapper">

	<header id="masthead" class="header">
		<div class="header__container container">
			<nav class="header__left-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header_left',
						'container'      => '',
						'menu_class'     => 'header__left-menu',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>

			<?php 
			$header = get_field('header', 'options');
			$logo =$header['logo'];
			if( $logo ) { ?>  
				<div class="header__logo">
					<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
					<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"></a>  
				</div>
			<?php } ?> 

			<nav class="header__right-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header_right',
						'container'      => '',
						'menu_class'     => 'header__right-menu',
						'menu_id'        => 'primarye-menu',
					)
				);
				?>
			</nav>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'mobile',
					'container'      => '',
					'menu_class'     => 'header__mobile',
					'menu_id'        => 'primarye-menu',
				)
			);
			?>

			<div class="header__burger">
				<span></span>
			</div>
		</div>
	</header><!-- #masthead -->

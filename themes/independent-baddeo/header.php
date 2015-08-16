<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */
?><!DOCTYPE html>
<html <?php independent_publisher_html_tag_schema(); ?> <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<!-- Etica from TypeKit
	<script src="//use.typekit.net/ryo3ksd.js"></script>
	<script>try{Typekit.load();}catch(e){}</script> -->
	
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'> -->
	<link href='http://fonts.googleapis.com/css?family=Lekton:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:300,400,700' rel='stylesheet' type='text/css'>
	
	<!-- UN-Etica -->
	<link href='<?php echo get_template_directory_uri(); ?>/fonts/etica/etica-ttf.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/fonts/etica/etica-light-ttf.css' rel='stylesheet' type='text/css'>
	
	<!-- STYLESHEETS -->
	<link href='<?php echo get_template_directory_uri(); ?>/css/ip.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/css/baddeo.css' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php // Displays full-width featured image on Single Posts if applicable ?>
<?php independent_publisher_full_width_featured_image(); ?>

<?php // Makes the Header Image a small icon floating in the top left corner when Multi Author Mode is enabled ?>
<?php if ( independent_publisher_is_multi_author_mode() && is_single() ) : ?>
	<div class="site-master-logo">
		<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img class="no-grav" src="<?php echo esc_url( get_header_image() ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>


<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	
		<div class="site-header-info">
			<?php 
				/*if ( is_single() ) 
				{
					// Show only post author info on Single Pages
					independent_publisher_posted_author_card();
				} 
				else
				{
					// Show Header Image, Site Title, and Site Tagline
					independent_publisher_site_info();
				}*/	
				independent_publisher_site_info();
			?>
		</div>

		<?php // Show navigation menu on everything except Single pages, unless Show Primary Nav Menu on Single Pages is enabled ?>
		<?php if ( ! is_single() || independent_publisher_show_nav_on_single() ) : ?>
			<nav role="navigation" class="site-navigation main-navigation">
				<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'independent-publisher' ); ?>"><?php _e( 'Skip to content', 'independent-publisher' ); ?></a>

				<?php // If this is a Single Post and we have a menu assigned to the "Single Posts Menu", show that ?>
				<?php if ( is_single() && has_nav_menu( 'single' ) ) : ?>
					<?php wp_nav_menu( array( 'theme_location' => 'single', 'depth' => 1 ) ); ?>
				<?php else : ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
				<?php endif; ?>

			</nav>
		<?php endif; ?>

		<?php do_action( 'independent_publisher_header_after' ); ?>
	</header>

	<div id="main" class="site-main">
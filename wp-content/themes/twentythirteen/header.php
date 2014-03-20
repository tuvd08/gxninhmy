<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

  <link rel="stylesheet" id="edit-style-css" href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
  <link rel="stylesheet" id="edit-style-css" href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="all">

  <link rel="stylesheet" id="edit-style-css" href="<?php echo get_template_directory_uri(); ?>/edit-style.css" type="text/css" media="all">
  
  	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

  
  <script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/simple-js.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ninhmy-base.js"></script>
  
  
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <div class="banner"></div>
			</a>

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
          <div class="max">
            <h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
          </div>
          <div class="min"><a href="javascript:void(0)" class="on-show-menu" data-toggle="tooltip" data-placement="bottom" title="Mở danh mục"> <i class="menu-show glyphicon glyphicon-list"></i></a></div>
					<?php get_search_form(); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main clearfix">

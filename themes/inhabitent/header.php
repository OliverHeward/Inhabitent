<?php
    /**
     * The Header Template.
     *
     * @package RED_Starter_Theme
     */
     
    ?><!DOCTYPE html>
<!-- Setting HTML lang -->
<html <?php language_attributes();?>>
    <!-- Start of Head -->
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php wp_head();?>
    </head>
    <!-- End of Head -->
    <!-- Start of Body -->
    <body <?php body_class();?>>
        <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html('Skip to content'); ?></a>
        <!-- Conditional checking if Page is Front Page/About/Adventures as they have Hero Images -->
        <?php if (is_front_page() || is_page('about') || is_singular($post_types = 'adventures')): ?>
        <!-- Start of Header Class Reverse only applied too pages on conditional above -->
        <header id="masthead" class="site-header reverse" role="banner">
        <!-- Start of Header Container -->
        <div class="container">
        	<!-- Site Branding -->
        	<div class="site-branding">
        			<!-- Inhabitent Logo and Screen Reader -->
            	<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-tent-white.svg" width="60px" height="auto" alt="inhabitent-logo" /></a>
            	<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        	</div>
        <!-- End of Site Branding -->
        <?php else : ?> 
        <!-- Start of Else Conditional for Site Header -->
        <header id="masthead" class="site-header" role="banner">
        	<!-- Start of Header Container -->
            <div class="container">
            	<!-- Site Branding -->
                <div class="site-branding">
                	<!-- Inhabitent Logo and Screen Reader -->
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-tent.svg" width="50px" height="auto" alt="inhabitent-logo" /></a>
                        <h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    </div>
                    <!-- End of Inhabitent Logo -->
                </div>
                <!-- End of Site Branding -->
                <?php endif;?>
                <!-- End if -->
                <!-- Start of Site Nav -->
                <nav id="site-navigation" class="main-navigation" role="navigation">
                	<!-- WordPress call for Navigation Menu -->
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php echo esc_html('Primary Menu'); ?></button>
                    <?php wp_nav_menu(array('theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'main-navigation',
                        'menu_id' => 'primary-menu',
                        ));?> <?php get_search_form() ?> <!-- Search Form Call -->
                </nav>
                <!-- End of Site Nav -->
            </div>
            <!-- End of Container -->
        </header>
        <!-- End of Header -->
        <!-- Start of Site Content -->
        <div id="content" class="site-content">
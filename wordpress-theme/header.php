<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="page">
        <div class="page-wrapper">
            <?php if (get_theme_mod('site_gallery') && is_single()) : ?>
                <div class="noiceland_photo-gallery">
                    <div class="photo-gallery__wrapper">
                        <div class="photo-gallery__image ibg">
                        </div>
                    </div>
                </div>
            <?php endif;
            if (get_theme_mod('site_preloader')) : ?>
                <div class="noiceland_preloader">
                    <div class="lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            <?php endif; ?>
            <header class="header">
                <style>
                    #wpadminbar {
                        position: absolute !important;
                    }

                    html {
                        margin: 0 !important;
                    }
                </style>
                <div class="header__wrapper">
                    <div class="burger__billet"></div>
                    <div class="container">
                        <div class="header__inner">
                            <?php if (get_theme_mod('custom_logo')) : ?>
                                <a href="<?php echo home_url('/'); ?>" class="header__logo">
                                    <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="noiceland logo">
                                </a>
                            <?php endif; ?>
                            <div class="burger__icon _isButton">
                                <span></span>
                            </div>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'header_nav',
                                'container' => 'nav',
                                'container_class' => 'header__nav burger__nav',
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </header>
            <div class="page-content container">
                <main class="main">
                    <article class="sections">
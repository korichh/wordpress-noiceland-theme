<?php

use function PHPSTORM_META\type;

function noiceland_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Title and description
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'noiceland_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'noiceland_customize_partial_blogdescription',
            )
        );
    }

    // My Section
    $section = 'noiceland_options';
    $transport = 'postMessage';

    $wp_customize->add_section($section, [
        'title'     => esc_html__('Theme options', 'noiceland'),
        'priority'  => 10,
        'description' => esc_html__('Theme options', 'noiceland'),
    ]);

    // Site Gallery
    $setting = 'site_gallery';

    $wp_customize->add_setting($setting, [
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control($setting, [
        'section'  => 'noiceland_options',
        'label'    => esc_html__('Add photo-gallery (in single page)', 'noiceland'),
        'type'     => 'checkbox',
    ]);

    // Site Animation
    $setting = 'site_animation';

    $wp_customize->add_setting($setting, [
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control($setting, [
        'section'  => 'noiceland_options',
        'label'    => esc_html__('Add animation', 'noiceland'),
        'type'     => 'checkbox',
    ]);

    // Site Preloader
    $setting = 'site_preloader';

    $wp_customize->add_setting($setting, [
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control($setting, [
        'section'  => 'noiceland_options',
        'label'    => esc_html__('Add preloader', 'noiceland'),
        'type'     => 'checkbox',
    ]);

    // Footer logo
    $setting = 'footer_logo';

    $wp_customize->add_setting($setting, [
        'transport' => $transport,
    ]);

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            $setting,
            array(
                'section'        => $section,
                'label'          => esc_html__('Footer logo', 'noiceland'),
                'settings'       => $setting,
                'type'           => 'image',
            )
        )
    );

    // Footer copyright
    $setting = 'footer_copyright_text';

    $wp_customize->add_setting($setting, [
        'default'            => esc_html__('All rights resolved', 'noiceland'),
        'sanitize_callback'  => 'sanitize_text_field',
        'transport'          => $transport
    ]);

    $wp_customize->add_control($setting, [
        'section'  => 'noiceland_options',
        'label'    => esc_html__('Footer copyright', 'noiceland'),
        'type'     => 'text'
    ]);
}
add_action('customize_register', 'noiceland_customize_register');

function noiceland_customize_preview_js()
{
    wp_enqueue_script('noiceland-customizer', get_template_directory_uri() . '/assets/js/customizer/customizer.js', array('jquery', 'customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'noiceland_customize_preview_js');

<?php

// function cc_mime_types($mimes)
// {
//     $mimes['svg'] = 'image/svg+xml';
//     return $mimes;
// }
// add_filter('upload_mimes', 'cc_mime_types');

function remove_url_comments($fields)
{
    if (!is_admin()) {
        $commenter = wp_get_current_commenter();
        $consent   = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
        $fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
            '<label for="wp-comment-cookies-consent">Save my name email in this browser for the next time I comment.</label></p>';

        unset($fields['url']);
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_url_comments');

function noiceland_query_filters($query)
{
    if (!is_admin()) {
        if ($query->is_search) {
            $query->set('posts_per_page', 8);
            $query->set('post_type', 'post');
        }

        if ($query->is_archive) {
            $query->set('posts_per_page', 4);
        }
    }

    return $query;
}
add_filter('pre_get_posts', 'noiceland_query_filters');

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

function noiceland_scripts()
{
    // Styles
    wp_enqueue_style('noiceland-options', get_template_directory_uri() . '/assets/css/options.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('noiceland-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), _S_VERSION, 'all');

    if (is_front_page() || is_page('latest')) {
        wp_enqueue_style('noiceland-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION, 'all');
    } else {
        wp_enqueue_style('noiceland-sidebar', get_template_directory_uri() . '/assets/css/sidebar.css', array(), _S_VERSION, 'all');
        wp_enqueue_script('noiceland-sidebar', get_template_directory_uri() . '/assets/js/StickySidebar.js', array(), _S_VERSION, true);
    }

    if (is_singular() && !is_front_page()) {
        wp_enqueue_style('noiceland-single', get_template_directory_uri() . '/assets/css/single.css', array(), _S_VERSION, 'all');
    }

    // Scripts
    wp_enqueue_script('noiceland-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);
    if (is_singular()) {
        wp_enqueue_script('noiceland-single', get_template_directory_uri() . '/assets/js/single.js', array(), _S_VERSION, true);
    }

    // Theme modifications
    if (get_theme_mod('site_gallery') && is_single()) {
        wp_enqueue_style('noiceland-gallery', get_template_directory_uri() . '/assets/css/customizer/gallery.css', array(), _S_VERSION, 'all');
        wp_enqueue_script('noiceland-gallery', get_template_directory_uri() . '/assets/js/customizer/gallery.js', array(), _S_VERSION, true);
    }

    if (get_theme_mod('site_animation')) {
        wp_enqueue_style('noiceland-animation', get_template_directory_uri() . '/assets/css/customizer/animation.css', array(), _S_VERSION, 'all');
        wp_enqueue_script('noiceland-animation', get_template_directory_uri() . '/assets/js/customizer/animation.js', array(), _S_VERSION, true);
    }

    if (get_theme_mod('site_preloader')) {
        wp_enqueue_style('noiceland-preloader', get_template_directory_uri() . '/assets/css/customizer/preloader.css', array(), _S_VERSION, 'all');
        wp_enqueue_script('noiceland-preloader', get_template_directory_uri() . '/assets/js/customizer/preloader.js', array(), _S_VERSION, true);
    }

    // Comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'noiceland_scripts');

function noiceland_init()
{
    register_nav_menus(
        array(
            'header_nav' => esc_html__('Header navigation'),
            'categories_nav' => esc_html__('Categories navigation'),
            'information_nav' => esc_html__('Information navigation'),
            'follow_nav' => esc_html__('Follow us navigation'),
            'template_nav' => esc_html__('Template navigation')
        )
    );
}
add_action('init', 'noiceland_init');

function noiceland_setup()
{
    load_theme_textdomain('noiceland', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support(
        'custom-background',
        apply_filters(
            'noiceland_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'noiceland_setup');

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

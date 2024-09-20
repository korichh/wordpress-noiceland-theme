<?php
if (!function_exists('noiceland_author')) :
    function noiceland_author()
    {
        $author = '<p class="post-author small-title">By <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></p>';

        echo $author;
    }
endif;

if (!function_exists('noiceland_post_thumbnail')) :
    function noiceland_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_single()) :
?>
            <div class="post-image ibg animBottom <?= (is_single() && get_theme_mod('site_gallery')) ? 'photo-gallery-class' : '' ?>">
                <?php the_post_thumbnail('full'); ?>
            </div>

        <?php else : ?>

            <a class="post-image ibg animLeft" href="<?php echo esc_url(get_permalink()); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'full',
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>

<?php
        endif;
    }
endif;

if (!function_exists('wp_body_open')) :
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
endif;

if (!function_exists('noiceland_paginate')) :
    function noiceland_paginate($query, $paged, array $args = [])
    {
        $big = 999999999;

        $defaults = array(
            'show_all'  => false,
            'prev_next' => true,
            'prev_text' => '« ' . esc_html__('Prev', 'noiceland'),
            'next_text' => esc_html__('Next', 'noiceland') . ' »',
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'plain',
        );

        $args = wp_parse_args($args, $defaults);

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $query->max_num_pages,

            'show_all'  => $args['show_all'],
            'prev_next' => $args['prev_next'],
            'prev_text' => $args['prev_text'],
            'next_text' => $args['next_text'],
            'end_size'  => $args['end_size'],
            'mid_size'  => $args['mid_size'],
            'type'      => $args['type'],
        ));
    }
endif;

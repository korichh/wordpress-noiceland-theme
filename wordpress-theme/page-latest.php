<?php get_header();

// Latest query
$paged = absint(
    max(
        1,
        get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
    )
);
$noiceland_latest_query = new WP_Query([
    'posts_per_page' => 8,
    'order' => 'ASC',
    'paged' => $paged
]);
if ($noiceland_latest_query->have_posts()) : ?>
    <section class="latest page-latest">
        <div class="latest__wrapper">
            <div class="latest__inner">
                <div class="latest__posts">
                    <?php
                    while ($noiceland_latest_query->have_posts()) : $noiceland_latest_query->the_post();
                        get_template_part('template-parts/content', '');
                    endwhile; ?>
                </div>
                <div class="latest__pagination pagination">
                    <?php noiceland_paginate($noiceland_latest_query, $paged); ?>
                </div>
            </div>
        </div>
    </section>
<?php
else :

    get_template_part('template-parts/content', 'none');

endif;
wp_reset_postdata();

get_footer();

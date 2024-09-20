<?php get_header();

// Hero query
$noiceland_hero_query = new WP_Query([
    'posts_per_page' => 7,
    'order' => 'ASC'
]);
if ($noiceland_hero_query->have_posts()) : ?>
    <section class="hero">
        <div class="hero__wrapper">
            <div class="hero__inner">
                <?php
                while ($noiceland_hero_query->have_posts()) : $noiceland_hero_query->the_post();
                    get_template_part('template-parts/content', '');
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php
else :

    get_template_part('template-parts/content', 'none');

endif;
wp_reset_postdata();

// Latest query
$noiceland_latest_query = new WP_Query([
    'posts_per_page' => 8,
    'order' => 'ASC'
]);
if ($noiceland_latest_query->have_posts()) : ?>
    <section class="latest">
        <div class="latest__wrapper">
            <div class="latest__inner">
                <h6 class="latest__title small-title">
                    <?php esc_html_e('Latest posts', 'noiceland') ?>
                </h6>
                <div class="latest__posts">
                    <?php
                    while ($noiceland_latest_query->have_posts()) : $noiceland_latest_query->the_post();
                        get_template_part('template-parts/content', '');
                    endwhile;
                    ?>
                </div>
                <a href="<?php echo home_url('/latest') ?>" class="latest__link">
                    <?php esc_html_e('View all latest posts', 'noiceland') ?>
                </a>
            </div>
        </div>
    </section>
<?php
else :

    get_template_part('template-parts/content', 'none');

endif;
wp_reset_postdata();

// Featured query
$noiceland_featured_query = new WP_Query([
    'posts_per_page' => 4,
    'order' => 'ASC',
    'tag' => 'featured'
]);
if ($noiceland_featured_query->have_posts()) : ?>
    <section class="featured">
        <div class="featured__wrapper">
            <div class="featured__inner">
                <h6 class="featured__title small-title">
                    <?php esc_html_e('Featured posts', 'noiceland') ?>
                </h6>
                <div class="featured__posts">
                    <?php
                    while ($noiceland_featured_query->have_posts()) : $noiceland_featured_query->the_post();
                        get_template_part('template-parts/content', '');
                    endwhile;
                    ?>
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

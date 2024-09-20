<?php get_header(); ?>

<section class="single-post">
    <div class="single-post__wrapper">

        <?php
        if (have_posts()) : ?>
            <div class="single-post__inner">
                <?php
                if (is_home() && !is_front_page()) : ?>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                <?php endif;

                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', get_post_type());

                endwhile; ?>
            </div>
            <div class="archive__pagination pagination">
                <?php echo paginate_links([
                    'prev_text' => '« ' . esc_html__('Prev', 'noiceland'),
                    'next_text' => esc_html__('Next', 'noiceland') . ' »',
                ]); ?>
            </div>
        <?php else : ?>
            <div class="single-post__inner">
                <?php get_template_part('template-parts/content', 'none'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();

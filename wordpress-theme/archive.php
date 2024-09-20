<?php get_header(); ?>

<section class="archive">
    <div class="archive__wrapper">

        <?php if (have_posts()) : ?>
            <div class="archive__inner">

                <h1 class="post-title">
                    <?php
                    the_archive_title();
                    the_archive_description();
                    ?>
                </h1>

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'short');

                endwhile; ?>
            </div>
            <div class="archive__pagination pagination">
                <?php echo paginate_links([
                    'prev_text' => '« ' . esc_html__('Prev', 'noiceland'),
                    'next_text' => esc_html__('Next', 'noiceland') . ' »',
                ]); ?>
            </div>
        <?php

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </div>
</section>

<?php
get_footer();

<?php get_header(); ?>

<section class="search">
    <div class="search__wrapper">

        <?php if (have_posts()) : ?>
            <div class="search__inner">

                <h1 class="post-title">
                    <?php
                    printf(esc_html__('Search Results for: %s', 'noiceland'), '<strong class="search-query">' . get_search_query() . '</strong>');
                    ?>
                </h1>

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'short');

                endwhile;

                ?>
            </div>
            <div class="search__pagination pagination">
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

<?php get_header(); ?>

<section class="single-post">
    <div class="single-post__wrapper">
        <div class="single-post__inner">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());

                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile;
            ?>

        </div>
    </div>
</section>

<?php
get_footer();

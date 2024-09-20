<?php get_header(); ?>

<section class="single-post">
    <div class="single-post__wrapper">
        <div class="single-post__inner">

            <section class="error-404 not-found post">
                <h1 class="post-title"><?php esc_html_e('Page not found', 'noiceland'); ?></h1>

                <div class="post-text">
                    <p><?php esc_html_e('The page you are looking for doesn\'t exist or has been moved.', 'noiceland'); ?></p>
                </div>
            </section>

        </div>
    </div>
</section>

<?php
get_footer();

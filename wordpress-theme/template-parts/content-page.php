<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <?php noiceland_post_thumbnail(); ?>
    <div class="post-content animBottom">
        <?php if (get_the_title() !== 'Newsletter') : ?>
            <h1 class="post-title">
                <?php the_title(); ?>
            </h1>
        <?php endif; ?>
        <div class="post-text">
            <?php the_content(); ?>
        </div>
    </div>
</article>
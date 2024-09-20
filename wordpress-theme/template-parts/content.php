<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <?php noiceland_post_thumbnail(); ?>
    <div class="post-content animBottom">
        <?php if (get_post_type() == 'post') :
            $cat = get_the_category()[0];
            $cat_name = $cat->name;
            $cat_link = get_category_link($cat->cat_ID);
        ?>
            <a class="post-category" href="<?php echo esc_url($cat_link); ?>">
                <h6 class="small-title"><?php echo esc_html($cat_name); ?></h6>
            </a>
        <?php endif;
        if (is_single()) : ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-text">
                <?php the_content(); ?>
            </div>
        <?php else : ?>
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <h2 class="post-title"><?php the_title(); ?></h2>
            </a>
            <div class="post-text">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>
        <?php noiceland_author(); ?>
    </div>
</article>
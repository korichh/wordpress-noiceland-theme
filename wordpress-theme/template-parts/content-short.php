<article id="post-<?php the_ID(); ?>" <?php post_class('post animLeft'); ?>>
    <div class="post-content">
        <?php if (get_post_type() == 'post') :
            $cat = get_the_category()[0];
            $cat_name = $cat->name;
            $cat_link = get_category_link($cat->cat_ID);
        ?>
            <a class="post-category" href="<?php echo esc_url($cat_link); ?>">
                <h6 class="small-title"><?php echo esc_html($cat_name); ?></h6>
            </a>
        <?php endif; ?>
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <h2 class="post-title"><?php the_title(); ?></h2>
        </a>
        <div class="post-text">
            <?php the_excerpt(); ?>
        </div>
        <?php noiceland_author(); ?>
    </div>
</article>
<article class="post post-none no-results not-found">
    <?php if (is_search()) : ?>
        <h1 class="post-title">
            <?php esc_html_e('Sorry, but nothing matched your search terms.', 'noiceland'); ?>
        </h1>
        <div class="post-text">
            <?php esc_html_e('Please try again with some different keywords.', 'noiceland'); ?>
        </div>
    <?php elseif (is_category()) : ?>
        <h1 class="post-title">
            <?php echo sprintf(esc_html__('No posts in category: %s', 'noiceland'), get_query_var('category_name')); ?>
        </h1>
    <?php else : ?>
        <h1 class="post-title">
            <?php esc_html_e('Nothing Found', 'noiceland'); ?>
        </h1>
    <?php endif; ?>
</article>
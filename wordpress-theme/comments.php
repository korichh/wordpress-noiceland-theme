<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    if (have_comments()) :
    ?>
        <h2 class="comments-title">
            <?php
            $noiceland_comment_count = get_comments_number();
            if ('1' === $noiceland_comment_count) {
                echo esc_html__('One comment on post', 'noiceland');
            } else {
                printf(
                    esc_html(_nx('%1$s comment on post', '%1$s comments on post', $noiceland_comment_count, 'comments title', 'noiceland')),
                    number_format_i18n($noiceland_comment_count)
                );
            }
            ?>
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style' => 'ul',
                )
            );
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
        ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'noiceland'); ?></p>
    <?php
        endif;

    endif;

    comment_form();
    ?>

</div>
</article>
</main>
<?php
if (!is_front_page() && !is_page('latest')) {
    get_sidebar();
}
?>
</div>
<footer class="footer">
    <div class="footer__wrapper">
        <div class="container">
            <div class="footer__inner">
                <div class="footer__copyright">
                    <?php if (get_theme_mod('footer_logo')) : ?>
                        <a href="<?php echo home_url('/'); ?>" class="footer__logo">
                            <img src="<?php echo get_theme_mod('footer_logo'); ?>" alt="noiceland logo">
                        </a>
                    <?php endif; ?>
                    <p class="footer__description">
                        <?php echo get_theme_mod('footer_copyright_text'); ?>
                    </p>
                </div>
                <div class="footer__navigations">
                    <div class="footer__top">
                        <nav class="footer__nav">
                            <div class="footer__small-title">
                                <h6 class="small-title"><?php esc_html_e('Categories', 'noiceland') ?></h6>
                                <svg class="arrow-down" height="20px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M98.9,184.7l1.8,2.1l136,156.5c4.6,5.3,11.5,8.6,19.2,8.6c7.7,0,14.6-3.4,19.2-8.6L411,187.1l2.3-2.6  c1.7-2.5,2.7-5.5,2.7-8.7c0-8.7-7.4-15.8-16.6-15.8v0H112.6v0c-9.2,0-16.6,7.1-16.6,15.8C96,179.1,97.1,182.2,98.9,184.7z" />
                                </svg>
                            </div>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'categories_nav',
                                'container' => false,
                            ));
                            ?>
                        </nav>
                        <form method="post" action="http://noiceland-blog/?na=s" class="footer__form">
                            <div class="footer__small-title">
                                <h6 class="small-title">Subscribe to newsletter</h6>
                                <svg class="arrow-down" height="20px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M98.9,184.7l1.8,2.1l136,156.5c4.6,5.3,11.5,8.6,19.2,8.6c7.7,0,14.6-3.4,19.2-8.6L411,187.1l2.3-2.6  c1.7-2.5,2.7-5.5,2.7-8.7c0-8.7-7.4-15.8-16.6-15.8v0H112.6v0c-9.2,0-16.6,7.1-16.6,15.8C96,179.1,97.1,182.2,98.9,184.7z" />
                                </svg>
                            </div>
                            <div class="footer__form-inputs">
                                <input type="hidden" name="nlang" value="">
                                <input class="tnp-email footer__form-input input-email" type="email" name="ne" id="tnp-2" placeholder="EMAIL ADDRESS" required>
                                <input class="tnp-submit footer__form-input input-submit" type="submit" value="Send">
                            </div>
                        </form>
                    </div>
                    <div class="footer__bottom">
                        <nav class="footer__nav">
                            <div class="footer__small-title">
                                <h6 class="small-title"><?php esc_html_e('Information', 'noiceland') ?></h6>
                                <svg class="arrow-down" height="20px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M98.9,184.7l1.8,2.1l136,156.5c4.6,5.3,11.5,8.6,19.2,8.6c7.7,0,14.6-3.4,19.2-8.6L411,187.1l2.3-2.6  c1.7-2.5,2.7-5.5,2.7-8.7c0-8.7-7.4-15.8-16.6-15.8v0H112.6v0c-9.2,0-16.6,7.1-16.6,15.8C96,179.1,97.1,182.2,98.9,184.7z" />
                                </svg>
                            </div>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'information_nav',
                                'container' => false,
                            ));
                            ?>
                        </nav>
                        <nav class="footer__nav">
                            <div class="footer__small-title">
                                <h6 class="small-title"><?php esc_html_e('Follow us', 'noiceland') ?></h6>
                                <svg class="arrow-down" height="20px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M98.9,184.7l1.8,2.1l136,156.5c4.6,5.3,11.5,8.6,19.2,8.6c7.7,0,14.6-3.4,19.2-8.6L411,187.1l2.3-2.6  c1.7-2.5,2.7-5.5,2.7-8.7c0-8.7-7.4-15.8-16.6-15.8v0H112.6v0c-9.2,0-16.6,7.1-16.6,15.8C96,179.1,97.1,182.2,98.9,184.7z" />
                                </svg>
                            </div>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'follow_nav',
                                'container' => false,
                            ));
                            ?>
                        </nav>
                        <nav class="footer__nav">
                            <div class="footer__small-title">
                                <h6 class="small-title"><?php esc_html_e('Template', 'noiceland') ?></h6>
                                <svg class="arrow-down" height="20px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M98.9,184.7l1.8,2.1l136,156.5c4.6,5.3,11.5,8.6,19.2,8.6c7.7,0,14.6-3.4,19.2-8.6L411,187.1l2.3-2.6  c1.7-2.5,2.7-5.5,2.7-8.7c0-8.7-7.4-15.8-16.6-15.8v0H112.6v0c-9.2,0-16.6,7.1-16.6,15.8C96,179.1,97.1,182.2,98.9,184.7z" />
                                </svg>
                            </div>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'template_nav',
                                'container' => false,
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>
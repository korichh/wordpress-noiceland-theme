jQuery(($) => {
    // Title
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });

    // Description
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    clip: 'rect(1px, 1px, 1px, 1px)',
                    position: 'absolute',
                });
            } else {
                $('.site-title, .site-description').css({
                    clip: 'auto',
                    position: 'relative',
                });
                $('.site-title a, .site-description').css({
                    color: to,
                });
            }
        });
    });

    // Footer logo
    wp.customize('footer_logo', function (value) {
        value.bind(function (to) {
            $('.footer__logo').children('img').attr({
                'src': to
            });
        });
    });

    // Footer copyright
    wp.customize('footer_copyright_text', function (value) {
        value.bind(function (to) {
            $('.footer__description').text(to);
        });
    });
});

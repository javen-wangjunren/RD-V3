(function () {
    let $, intervalId, ready;
    let isDesktopActive = false;

    intervalId = setInterval(() => {
        if (window.jQuery) {
            clearInterval(intervalId);
            $ = window.jQuery;
            $(document).ready(ready);
        }
    }, 100);

    ready = function () {

        function initMenus() {
            if (window.innerWidth <= 1023 || isDesktopActive) return;

            isDesktopActive = true;

            menuReinit('.menu-item-113', '.mml-ele-custom-menu-1');
            menuReinit('.menu-item-126', '.mml-ele-custom-menu-3');
            menuReinit('.menu-item-132', '.mml-ele-custom-menu-2');
            menuReinit('.menu-item-143', '.mml-ele-custom-menu-4');
            menuReinit('.menu-item-87295', '.mml-ele-custom-menu-5');
            menuReinit('.menu-item-95522', '.mml-ele-custom-menu-6');
        }

        function destroyMenus() {
            if (!isDesktopActive) return;

            isDesktopActive = false;

            $('.mml-ele-custom-menu').removeClass('active');
            $('.menu-item')
                .off('mousemove')
                .removeClass('current-menu-ancestor');

            $('body').off('mousemove');
        }

        function menuReinit(menuSelector, containerSelector) {
            console.log('reinit function working ----------------------->>>>>>>>>>>>');

            let $header = $('.elementor-location-header');
            let topGap = $header.outerHeight() || 0;

            let $wpadminbar = $('#wpadminbar');
            if ($wpadminbar.length) {
                topGap += $wpadminbar.outerHeight();
            }

            let $menu = $(menuSelector);
            let $container = $(containerSelector);

            // Prevent duplicate bindings
            $menu.off('mousemove').on('mousemove', function (e) {
                e.stopPropagation();
                $('.mml-ele-custom-menu').removeClass('active');
                $container.addClass('active').css({ top: topGap });
            });

            $container.off('mousemove').on('mousemove', function (e) {
                e.stopPropagation();
            });

            $('body').off('mousemove.menuHide').on('mousemove.menuHide', function () {
                $container.removeClass('active');
            });

            // Highlight active menu
            if (
                $container.get(0)?.outerHTML.indexOf(window.location.pathname) > -1 &&
                window.location.pathname !== '/'
            ) {
                $menu.addClass('current-menu-ancestor');
            }
        }

        // Initial run
        initMenus();

        // Re-check on resize
        $(window).on('resize', function () {
            if (window.innerWidth > 1023) {
                initMenus();
            } else {
                destroyMenus();
            }
        });
    };
})();

"use strict";

(function () {
  var $, intervalId, ready;
  var isDesktopActive = false;
  intervalId = setInterval(function () {
    if (window.jQuery) {
      clearInterval(intervalId);
      $ = window.jQuery;
      $(document).ready(ready);
    }
  }, 100);

  ready = function ready() {
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
      $('.menu-item').off('mousemove').removeClass('current-menu-ancestor');
      $('body').off('mousemove');
    }

    function menuReinit(menuSelector, containerSelector) {
      var _$container$get;

      console.log('reinit function working ----------------------->>>>>>>>>>>>');
      var $header = $('.elementor-location-header');
      var topGap = $header.outerHeight() || 0;
      var $wpadminbar = $('#wpadminbar');

      if ($wpadminbar.length) {
        topGap += $wpadminbar.outerHeight();
      }

      var $menu = $(menuSelector);
      var $container = $(containerSelector); // Prevent duplicate bindings

      $menu.off('mousemove').on('mousemove', function (e) {
        e.stopPropagation();
        $('.mml-ele-custom-menu').removeClass('active');
        $container.addClass('active').css({
          top: topGap
        });
      });
      $container.off('mousemove').on('mousemove', function (e) {
        e.stopPropagation();
      });
      $('body').off('mousemove.menuHide').on('mousemove.menuHide', function () {
        $container.removeClass('active');
      }); // Highlight active menu

      if (((_$container$get = $container.get(0)) === null || _$container$get === void 0 ? void 0 : _$container$get.outerHTML.indexOf(window.location.pathname)) > -1 && window.location.pathname !== '/') {
        $menu.addClass('current-menu-ancestor');
      }
    } // Initial run


    initMenus(); // Re-check on resize

    $(window).on('resize', function () {
      if (window.innerWidth > 1023) {
        initMenus();
      } else {
        destroyMenus();
      }
    });
  };
})();
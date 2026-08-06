// "use strict";

// (function () {
//   var $, intervalId, ready;
//   intervalId = setInterval(function () {
//     if (window.jQuery) {
//       clearInterval(intervalId);
//       $ = window.jQuery;
//       $(document).ready(ready);
//     }
//   }, 100);

//   ready = function ready() {
//     menuReinit('.menu-item-113', '.mml-ele-custom-menu-1');
//     menuReinit('.menu-item-126', '.mml-ele-custom-menu-3');
//     menuReinit('.menu-item-132', '.mml-ele-custom-menu-2');
//     menuReinit('.menu-item-143', '.mml-ele-custom-menu-4');
// 	  menuReinit('.menu-item-87295', '.mml-ele-custom-menu-5');
// 		menuReinit('.menu-item-95522', '.mml-ele-custom-menu-6');

//     function menuReinit(menuSelector, containerSelector) {
//       var $header = $('.elementor-location-header');
//       var topGap = $header.height();
//       var $wpadminbar = $('#wpadminbar');

//       if ($wpadminbar.length > 0) {
//         topGap += $wpadminbar.height();
//       }

//       var $menu = $(menuSelector);
//       var $container = $(containerSelector);
//       $menu.on('mousemove', function (e) {
//         e.stopPropagation();
//         $('.mml-ele-custom-menu').removeClass('active');
//         $container.addClass('active').css({
//           top: topGap
//         });
//       });
//       $container.on('mousemove', function (e) {
//         e.stopPropagation();
//       });
//       $('body').on('mousemove', function () {
//         $container.removeClass('active');
//       }); // 高亮

//       if ($container.get(0).outerHTML.indexOf(window.location.pathname) > -1 && window.location.pathname !== '/') {
//         $menu.addClass('current-menu-ancestor'); // current-menu-item current-menu-ancestor current-menu-parent
//       }
//     }
//   };
// })();
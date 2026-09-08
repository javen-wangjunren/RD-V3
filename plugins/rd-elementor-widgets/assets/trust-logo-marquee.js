(function ($) {
  'use strict';

  function initRdTlm($scope) {
    var $track = $scope.find('.rd-tlm__track');
    if (!$track.length) {
      return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      $track.css('animation', 'none');
    }
  }

  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/rd-trust-logo-marquee.default', initRdTlm);
  });
})(jQuery);

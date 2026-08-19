/**
 * Service Case Study — manual carousel
 * Multi-instance safe; keyboard navigation scoped to focused carousel.
 */
(function () {
  'use strict';

  function initWidget(root) {
    if (!root || root.dataset.rdScsInit === '1') {
      return;
    }
    root.dataset.rdScsInit = '1';

    var carousel = root.querySelector('.rd-scs__carousel');
    var track = root.querySelector('.rd-scs__track');
    var slides = root.querySelectorAll('.rd-scs__slide');
    var dots = root.querySelectorAll('.rd-scs__dot');
    var prevBtn = root.querySelector('.rd-scs__arrow--prev');
    var nextBtn = root.querySelector('.rd-scs__arrow--next');

    if (!track || slides.length === 0) {
      return;
    }

    var total = slides.length;
    var current = 0;

    function goTo(index) {
      if (index < 0) {
        index = total - 1;
      } else if (index >= total) {
        index = 0;
      }
      current = index;

      for (var i = 0; i < slides.length; i++) {
        slides[i].classList.toggle('is-active', i === current);
      }

      for (var j = 0; j < dots.length; j++) {
        var isActive = j === current;
        dots[j].classList.toggle('is-active', isActive);
        dots[j].setAttribute('aria-selected', isActive ? 'true' : 'false');
      }
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function () {
        goTo(current - 1);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function () {
        goTo(current + 1);
      });
    }

    for (var k = 0; k < dots.length; k++) {
      dots[k].addEventListener('click', function () {
        var idx = parseInt(this.dataset.index, 10);
        if (!isNaN(idx)) {
          goTo(idx);
        }
      });
    }

    if (carousel) {
      carousel.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft') {
          e.preventDefault();
          goTo(current - 1);
        } else if (e.key === 'ArrowRight') {
          e.preventDefault();
          goTo(current + 1);
        }
      });
    }
  }

  function initAll() {
    var widgets = document.querySelectorAll('[data-rd-scs-id]');
    for (var i = 0; i < widgets.length; i++) {
      initWidget(widgets[i]);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }

  if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
    elementorFrontend.hooks.addAction('frontend/element_ready/rd-service-case-study.default', function ($scope) {
      var root = $scope && $scope[0] ? $scope[0].querySelector('[data-rd-scs-id]') : null;
      initWidget(root);
    });
  }
})();

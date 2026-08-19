(function () {
  function initInstance(root) {
    if (!root || root.dataset.rdToolingShowcaseInit === '1') return;
    root.dataset.rdToolingShowcaseInit = '1';

    var viewport = root.querySelector('[data-showcase-viewport]');
    var prevBtn = root.querySelector('[data-showcase-prev]');
    var nextBtn = root.querySelector('[data-showcase-next]');

    if (!viewport || !prevBtn || !nextBtn) return;

    function getScrollStep() {
      var firstCard = viewport.querySelector('[data-showcase-card]');
      if (!firstCard) return 320;
      var style = window.getComputedStyle(viewport.querySelector('.rd-tooling-showcase__track'));
      var gap = parseFloat(style.columnGap || style.gap || '20');
      if (window.isNaN(gap)) gap = 20;
      return firstCard.offsetWidth + gap;
    }

    prevBtn.addEventListener('click', function () {
      viewport.scrollLeft -= getScrollStep();
    });

    nextBtn.addEventListener('click', function () {
      viewport.scrollLeft += getScrollStep();
    });
  }

  function initAll(container) {
    var root = container || document;
    var els = root.querySelectorAll('section[data-rd-tooling-showcase]');
    for (var i = 0; i < els.length; i++) initInstance(els[i]);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initAll(document);
    });
  } else {
    initAll(document);
  }

  if (window.elementorFrontend && window.elementorFrontend.hooks && window.elementorFrontend.hooks.addAction) {
    window.elementorFrontend.hooks.addAction('frontend/element_ready/rd-tooling-showcase.default', function ($scope) {
      var el = $scope && $scope[0] ? $scope[0] : null;
      if (!el) return;
      initAll(el);
    });
  }
})();

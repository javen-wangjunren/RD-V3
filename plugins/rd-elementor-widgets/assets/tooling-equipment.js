(function () {
  function getGapPx(track) {
    if (!track) return 0;
    var style = window.getComputedStyle(track);
    var gap = style.columnGap || style.gap || '0px';
    var num = parseFloat(gap);
    return isNaN(num) ? 0 : num;
  }

  function initInstance(root) {
    if (!root || root.dataset.rdToolingEquipmentInit === '1') return;
    root.dataset.rdToolingEquipmentInit = '1';

    var track = root.querySelector('[data-equipment-track]');
    var prevBtn = root.querySelector('[data-equipment-prev]');
    var nextBtn = root.querySelector('[data-equipment-next]');

    if (!track || !prevBtn || !nextBtn) return;

    function getScrollAmount() {
      var card = track.querySelector('[data-equipment-card]');
      var cardWidth = card ? card.getBoundingClientRect().width : 0;
      var gap = getGapPx(track);
      if (cardWidth <= 0) return 300;
      return cardWidth + gap;
    }

    nextBtn.addEventListener('click', function () {
      track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', function () {
      track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
    });
  }

  function initAll(container) {
    var root = container || document;
    var els = root.querySelectorAll('section[data-rd-tooling-equipment]');
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
    window.elementorFrontend.hooks.addAction('frontend/element_ready/rd-tooling-equipment.default', function ($scope) {
      var el = $scope && $scope[0] ? $scope[0] : null;
      if (!el) return;
      initAll(el);
    });
  }
})();


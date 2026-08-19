(function () {
  function isMobileViewport() {
    if (!window.matchMedia) return false;
    return window.matchMedia('(max-width: 992px)').matches;
  }

  function initInstance(root) {
    if (!root || root.dataset.rdToolingProcessInit === '1') return;
    root.dataset.rdToolingProcessInit = '1';

    var tabs = Array.prototype.slice.call(root.querySelectorAll('[data-step-index]'));
    var panels = Array.prototype.slice.call(root.querySelectorAll('[data-panel-index]'));

    if (!tabs.length || !panels.length) return;

    function activate(index) {
      for (var i = 0; i < tabs.length; i++) {
        var isActive = i === index;
        tabs[i].classList.toggle('is-active', isActive);
        tabs[i].setAttribute('aria-selected', isActive ? 'true' : 'false');
        tabs[i].setAttribute('tabindex', isActive ? '0' : '-1');
      }

      for (var j = 0; j < panels.length; j++) {
        var panelActive = j === index;
        panels[j].classList.toggle('is-active', panelActive);
        if (panelActive) {
          panels[j].removeAttribute('hidden');
        } else {
          panels[j].setAttribute('hidden', 'hidden');
        }
      }
    }

    tabs.forEach(function (tab, index) {
      tab.addEventListener('click', function () {
        activate(index);
      });

      tab.addEventListener('mouseenter', function () {
        if (isMobileViewport()) return;
        activate(index);
      });

      tab.addEventListener('focus', function () {
        activate(index);
      });

      tab.addEventListener('keydown', function (e) {
        var key = e.key;
        var nextIndex = index;

        if (key === 'ArrowDown' || key === 'ArrowRight') {
          nextIndex = index + 1 >= tabs.length ? 0 : index + 1;
        } else if (key === 'ArrowUp' || key === 'ArrowLeft') {
          nextIndex = index - 1 < 0 ? tabs.length - 1 : index - 1;
        } else if (key === 'Home') {
          nextIndex = 0;
        } else if (key === 'End') {
          nextIndex = tabs.length - 1;
        } else {
          return;
        }

        e.preventDefault();
        activate(nextIndex);
        tabs[nextIndex].focus();
      });
    });

    activate(0);
  }

  function initAll(container) {
    var root = container || document;
    var els = root.querySelectorAll('section[data-rd-tooling-process]');
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
    window.elementorFrontend.hooks.addAction('frontend/element_ready/rd-tooling-process.default', function ($scope) {
      var el = $scope && $scope[0] ? $scope[0] : null;
      if (!el) return;
      initAll(el);
    });
  }
})();

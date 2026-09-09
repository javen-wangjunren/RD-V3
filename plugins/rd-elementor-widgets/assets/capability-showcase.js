/* Capability Showcase — Elementor Widget */
(function () {
  'use strict';

  function initCapabilityShowcase(root) {
    const sections = root.querySelectorAll('.rd-cs');

    sections.forEach(function (section) {
      if (section.dataset.rdCsInitialized) {
        return;
      }
      section.dataset.rdCsInitialized = 'true';

      const tabs = section.querySelectorAll('.rd-cs__tab');
      const panels = section.querySelectorAll('.rd-cs__panel');

      if (tabs.length === 0 || panels.length === 0) {
        return;
      }

      tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
          const index = tab.dataset.index;

          tabs.forEach(function (t) {
            t.classList.remove('rd-cs__tab--active');
            t.setAttribute('aria-selected', 'false');
          });

          panels.forEach(function (p) {
            p.classList.remove('rd-cs__panel--active');
          });

          tab.classList.add('rd-cs__tab--active');
          tab.setAttribute('aria-selected', 'true');

          const activePanel = section.querySelector('.rd-cs__panel[data-index="' + index + '"]');
          if (activePanel) {
            activePanel.classList.add('rd-cs__panel--active');
          }
        });
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initCapabilityShowcase(document);
    });
  } else {
    initCapabilityShowcase(document);
  }

  // Elementor editor live preview.
  window.addEventListener('elementor/frontend/init', function () {
    if (window.elementorFrontend && window.elementorFrontend.hooks) {
      window.elementorFrontend.hooks.addAction('frontend/element_ready/rd-capability-showcase.default', function ($scope) {
        initCapabilityShowcase($scope[0]);
      });
    }
  });
})();

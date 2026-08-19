(function () {
  'use strict';

  function initSolutionFAQ(scope) {
    var items = scope.querySelectorAll('[data-rd-faq-item]');
    if (!items.length) return;

    items.forEach(function (item) {
      var trigger = item.querySelector('.rd-solution-faq__trigger');
      var panel = item.querySelector('.rd-solution-faq__panel');
      if (!trigger || !panel) return;

      trigger.addEventListener('click', function () {
        var willOpen = !item.classList.contains('is-open');

        items.forEach(function (otherItem) {
          var otherTrigger = otherItem.querySelector('.rd-solution-faq__trigger');
          var otherPanel = otherItem.querySelector('.rd-solution-faq__panel');

          otherItem.classList.remove('is-open');
          if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
          if (otherPanel) otherPanel.setAttribute('aria-hidden', 'true');
        });

        if (willOpen) {
          item.classList.add('is-open');
          trigger.setAttribute('aria-expanded', 'true');
          panel.setAttribute('aria-hidden', 'false');
        }
      });
    });
  }

  function initAll() {
    var sections = document.querySelectorAll('.rd-solution-faq');
    sections.forEach(initSolutionFAQ);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }
})();

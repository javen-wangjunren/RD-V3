(function () {
  function parseSettings(el) {
    var raw = el.getAttribute('data-settings');
    if (!raw) return {};
    try {
      return JSON.parse(raw);
    } catch (e) {
      return {};
    }
  }

  function prefersReducedMotion() {
    if (!window.matchMedia) return false;
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  function initInstance(root) {
    if (!root || root.dataset.rdAiCreatorInit === '1') return;
    root.dataset.rdAiCreatorInit = '1';

    var carousel = root.querySelector('[data-carousel]');
    var track = root.querySelector('[data-track]');
    var dotsWrap = root.querySelector('[data-dots]');

    if (!carousel || !track || !dotsWrap) return;

    var settings = parseSettings(root);
    var interval = typeof settings.interval === 'number' ? settings.interval : parseInt(settings.interval || '2000', 10);
    if (!interval || interval < 500) interval = 2000;
    var pauseOnHover = settings.pauseOnHover === 1 || settings.pauseOnHover === '1' || settings.pauseOnHover === true;

    var originalCards = Array.prototype.slice.call(track.children);
    var count = originalCards.length;
    if (count === 0) {
      dotsWrap.style.display = 'none';
      return;
    }

    var reduceMotion = prefersReducedMotion();

    dotsWrap.innerHTML = '';
    var dots = [];
    for (var i = 0; i < count; i++) {
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'rd-ai-creator__dot';
      btn.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      btn.setAttribute('data-index', String(i));
      dotsWrap.appendChild(btn);
      dots.push(btn);
    }

    function setActiveDot(idx) {
      for (var d = 0; d < dots.length; d++) {
        if (d === idx) dots[d].classList.add('is-active');
        else dots[d].classList.remove('is-active');
      }
    }

    setActiveDot(0);

    var clonedFirst = null;
    if (count > 1) {
      clonedFirst = originalCards[0].cloneNode(true);
      clonedFirst.setAttribute('data-clone', '1');
      track.appendChild(clonedFirst);
    }

    var currentIndex = 0;
    var timer = null;
    var transitionMs = reduceMotion ? 0 : 650;
    var isAnimating = false;

    function offsetForIndex(idx) {
      var child = track.children[idx];
      if (!child) return 0;
      return child.offsetLeft || 0;
    }

    function applyTransform(idx, animate) {
      var x = offsetForIndex(idx);
      if (animate) {
        track.style.transition = 'transform ' + transitionMs + 'ms cubic-bezier(0.2, 0.8, 0.2, 1)';
      } else {
        track.style.transition = 'none';
      }
      track.style.transform = 'translateX(' + (-x) + 'px)';
    }

    function goTo(idx, animate) {
      if (typeof animate === 'undefined') animate = true;
      if (isAnimating) return;
      currentIndex = idx;

      var active = idx;
      if (count > 1 && idx === count) active = 0;
      setActiveDot(active);

      var shouldAnimate = animate && !reduceMotion;
      isAnimating = shouldAnimate;
      applyTransform(idx, shouldAnimate);
    }

    function stop() {
      if (timer) {
        window.clearInterval(timer);
        timer = null;
      }
    }

    function start() {
      if (reduceMotion) return;
      if (count <= 1) return;
      if (timer) return;
      timer = window.setInterval(function () {
        if (isAnimating) return;
        goTo(currentIndex + 1, true);
      }, interval);
    }

    track.addEventListener('transitionend', function () {
      if (count <= 1) return;
      isAnimating = false;
      if (currentIndex === count) {
        currentIndex = 0;
        goTo(0, false);
      }
    });

    dotsWrap.addEventListener('click', function (e) {
      var target = e.target;
      if (!target || !target.getAttribute) return;
      var idxRaw = target.getAttribute('data-index');
      if (idxRaw === null) return;
      var idx = parseInt(idxRaw, 10);
      if (Number.isNaN(idx)) return;
      stop();
      goTo(idx, true);
      start();
    });

    if (pauseOnHover && count > 1 && !reduceMotion) {
      carousel.addEventListener('mouseenter', stop);
      carousel.addEventListener('mouseleave', start);
      carousel.addEventListener('focusin', stop);
      carousel.addEventListener('focusout', start);
      carousel.addEventListener('touchstart', stop, { passive: true });
    }

    function syncNoAnim() {
      if (count <= 1) return;
      goTo(currentIndex, false);
    }

    if (window.ResizeObserver) {
      var ro = new ResizeObserver(function () {
        syncNoAnim();
      });
      ro.observe(carousel);
    } else {
      window.addEventListener('resize', syncNoAnim);
    }

    if (count <= 1) {
      dotsWrap.style.display = 'none';
    } else {
      dotsWrap.style.display = '';
    }

    goTo(0, false);
    start();
  }

  function initAll(container) {
    var root = container || document;
    var els = root.querySelectorAll('section[data-rd-ai-creator]');
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
    window.elementorFrontend.hooks.addAction('frontend/element_ready/rd-ai-creator.default', function ($scope) {
      var el = $scope && $scope[0] ? $scope[0] : null;
      if (!el) return;
      initAll(el);
    });
  }
})();

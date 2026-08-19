(function () {
  function uniq(list) {
    var map = Object.create(null);
    var out = [];
    for (var i = 0; i < list.length; i++) {
      var v = list[i];
      if (!v) continue;
      if (map[v]) continue;
      map[v] = true;
      out.push(v);
    }
    return out;
  }

  function parseProcessParam(value) {
    if (!value) return [];
    return value
      .split(',')
      .map(function (s) {
        return (s || '').trim().toLowerCase();
      })
      .filter(Boolean);
  }

  function parsePageParam(value) {
    var n = parseInt(String(value || '').trim(), 10);
    return Number.isFinite(n) && n > 0 ? n : 1;
  }

  function getUrlState() {
    var u = new URL(window.location.href);
    var q = (u.searchParams.get('q') || '').trim();
    var process = (u.searchParams.get('process') || '').trim();
    var page = parsePageParam(u.searchParams.get('page'));
    return { q: q, processes: parseProcessParam(process), page: page };
  }

  function setUrlState(pathname, next) {
    var u = new URL(window.location.href);
    if (next.q) u.searchParams.set('q', next.q);
    else u.searchParams.delete('q');

    if (next.processes && next.processes.length) {
      u.searchParams.set('process', uniq(next.processes).join(','));
    } else {
      u.searchParams.delete('process');
    }

    if (next.page && next.page > 1) u.searchParams.set('page', String(next.page));
    else u.searchParams.delete('page');

    window.history.replaceState({}, '', pathname + u.search);
  }

  function debounce(fn, wait) {
    var t = 0;
    return function () {
      var args = arguments;
      window.clearTimeout(t);
      t = window.setTimeout(function () {
        fn.apply(null, args);
      }, wait);
    };
  }

  function getPreferredPath(root) {
    var baseUrl = root.getAttribute('data-base-url') || '';
    if (!baseUrl) return window.location.pathname;
    try {
      var u = new URL(baseUrl, window.location.origin);
      if (u.origin !== window.location.origin) return window.location.pathname;
      return u.pathname || window.location.pathname;
    } catch (e) {
      return window.location.pathname;
    }
  }

  function initInstance(root) {
    if (!root || root.dataset.rdMaterialLibraryInit === '1') return;
    root.dataset.rdMaterialLibraryInit = '1';

    var enableUrlSync = document.querySelectorAll('section[data-rd-material-library]').length === 1;
    var pathname = getPreferredPath(root);
    var elQ = root.querySelector('[data-rd-ml-q]');
    var elApply = root.querySelector('[data-rd-ml-apply]');
    var elClear = root.querySelector('[data-rd-ml-clear]');
    var elResetProcess = root.querySelector('[data-rd-ml-reset-process]');
    var elResultCount = root.querySelector('[data-rd-ml-result-count]');
    var elProcessWrap = root.querySelector('[data-rd-ml-processes]');
    var elGrid = root.querySelector('[data-rd-ml-grid]');
    var elEmpty = root.querySelector('[data-rd-ml-empty]');
    var elTypesWrap = root.querySelector('[data-rd-ml-types]');
    var elPagination = root.querySelector('[data-rd-ml-pagination]');
    var elPagePrev = root.querySelector('[data-rd-ml-page-prev]');
    var elPageNext = root.querySelector('[data-rd-ml-page-next]');
    var elPageList = root.querySelector('[data-rd-ml-page-list]');
    var elPageInfo = root.querySelector('[data-rd-ml-page-info]');

    if (!elQ || !elGrid) return;

    var cards = Array.prototype.slice
      .call(elGrid.querySelectorAll('.rd-material-library__card'))
      .filter(function (node) {
        return node !== elEmpty;
      });

    var typeBtns = elTypesWrap ? Array.prototype.slice.call(elTypesWrap.querySelectorAll('[data-rd-ml-type]')) : [];
    var activeType = 'all';
    var itemsPerPage = 12;
    var currentPage = 1;

    function setActiveType(nextType) {
      activeType = nextType || 'all';
      for (var i = 0; i < typeBtns.length; i++) {
        var t = typeBtns[i].getAttribute('data-rd-ml-type') || 'all';
        typeBtns[i].classList.toggle('is-active', t === activeType);
        typeBtns[i].setAttribute('aria-pressed', t === activeType ? 'true' : 'false');
      }
      currentPage = 1;
      if (enableUrlSync) {
        var s = readUIState();
        setUrlState(pathname, { q: s.q, processes: s.processes, page: currentPage });
      }
      render(false, true);
    }

    for (var tb = 0; tb < typeBtns.length; tb++) {
      typeBtns[tb].addEventListener('click', function (e) {
        var t = e.currentTarget.getAttribute('data-rd-ml-type') || 'all';
        setActiveType(t);
      });
    }

    function readUIState() {
      var q = (elQ.value || '').trim();
      var processes = [];
      if (elProcessWrap) {
        var inputs = elProcessWrap.querySelectorAll('input[type="checkbox"][data-rd-ml-process]');
        for (var i = 0; i < inputs.length; i++) {
          if (inputs[i].checked) processes.push((inputs[i].value || '').toLowerCase());
        }
      }
      return { q: q, processes: processes };
    }

    function applyUrlFromUI(resetPage) {
      var s = readUIState();
      if (resetPage) currentPage = 1;
      if (enableUrlSync) setUrlState(pathname, { q: s.q, processes: s.processes, page: currentPage });
      render(true, true);
    }

    function setUIFromUrl() {
      if (!enableUrlSync) return;
      var s = getUrlState();
      elQ.value = s.q || '';
      currentPage = s.page || 1;
      if (elProcessWrap) {
        var inputs = elProcessWrap.querySelectorAll('input[type="checkbox"][data-rd-ml-process]');
        for (var i = 0; i < inputs.length; i++) {
          var v = (inputs[i].value || '').toLowerCase();
          inputs[i].checked = s.processes.indexOf(v) >= 0;
        }
      }
    }

    function matches(card, state, type) {
      if (type && type !== 'all') {
        var ct = (card.getAttribute('data-type') || '').toLowerCase();
        if (ct !== type) return false;
      }

      var q = (state.q || '').toLowerCase();
      if (q) {
        var title = card.getAttribute('data-title') || '';
        var aliases = card.getAttribute('data-aliases') || '';
        var hay = (title + ' ' + aliases).toLowerCase();
        var tokens = q
          .split(/[\s,]+/)
          .filter(Boolean)
          .filter(function (t) {
            return t.length >= 2;
          });
        if (tokens.length) {
          var hit = false;
          for (var ti = 0; ti < tokens.length; ti++) {
            if (hay.indexOf(tokens[ti]) !== -1) hit = true;
          }
          if (!hit) return false;
        }
      }

      if (state.processes && state.processes.length) {
        var cardProc = (card.getAttribute('data-processes') || '').toLowerCase();
        var ok = false;
        for (var i = 0; i < state.processes.length; i++) {
          if (cardProc.indexOf(state.processes[i]) >= 0) ok = true;
        }
        if (!ok) return false;
      }

      return true;
    }

    function updateTypeCounts(baseState) {
      if (!typeBtns.length) return;
      var counts = Object.create(null);
      counts.all = 0;

      for (var i = 0; i < cards.length; i++) {
        if (!matches(cards[i], baseState, 'all')) continue;
        counts.all++;
        var t = (cards[i].getAttribute('data-type') || '').toLowerCase();
        if (!t) continue;
        counts[t] = (counts[t] || 0) + 1;
      }

      for (var j = 0; j < typeBtns.length; j++) {
        var key = (typeBtns[j].getAttribute('data-rd-ml-type') || 'all').toLowerCase();
        var countEl = typeBtns[j].querySelector('[data-rd-ml-type-count="' + key + '"]');
        if (!countEl) continue;
        countEl.textContent = '(' + (counts[key] || 0) + ')';
      }
    }

    function getPageModel(totalPages, page) {
      var out = [];
      if (totalPages <= 7) {
        for (var i = 1; i <= totalPages; i++) out.push(i);
        return out;
      }

      if (page <= 4) return [1, 2, 3, 4, 5, '...', totalPages];
      if (page >= totalPages - 3) return [1, '...', totalPages - 4, totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
      return [1, '...', page - 1, page, page + 1, '...', totalPages];
    }

    function renderPagination(totalPages) {
      if (!elPagination || !elPageList || !elPagePrev || !elPageNext) return;
      if (totalPages <= 1) {
        elPagination.hidden = true;
        return;
      }

      elPagination.hidden = false;
      elPagePrev.disabled = currentPage <= 1;
      elPageNext.disabled = currentPage >= totalPages;

      elPageList.innerHTML = '';
      var model = getPageModel(totalPages, currentPage);
      for (var i = 0; i < model.length; i++) {
        if (model[i] === '...') {
          var elE = document.createElement('span');
          elE.className = 'rd-material-library__page-ellipsis';
          elE.textContent = '…';
          elPageList.appendChild(elE);
          continue;
        }

        var n = model[i];
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'rd-material-library__page-num' + (n === currentPage ? ' is-active' : '');
        btn.textContent = String(n);
        btn.setAttribute('data-rd-ml-page', String(n));
        btn.addEventListener('click', function (e) {
          var v = parseInt(e.currentTarget.getAttribute('data-rd-ml-page') || '1', 10);
          setPage(v);
        });
        elPageList.appendChild(btn);
      }

      if (elPageInfo) elPageInfo.textContent = 'Page ' + String(currentPage) + ' of ' + String(totalPages);
    }

    function setPage(next) {
      var n = parseInt(String(next || '1'), 10);
      currentPage = Number.isFinite(n) && n > 0 ? n : 1;
      if (enableUrlSync) {
        var s = readUIState();
        setUrlState(pathname, { q: s.q, processes: s.processes, page: currentPage });
      }
      render(false, true);
    }

    function render(updateCounts, updatePaginationUI) {
      var s = readUIState();
      var matched = [];

      if (updateCounts) updateTypeCounts(s);

      for (var i = 0; i < cards.length; i++) {
        if (matches(cards[i], s, activeType)) matched.push(cards[i]);
      }

      var total = matched.length;
      var totalPages = total ? Math.ceil(total / itemsPerPage) : 1;
      if (currentPage > totalPages) currentPage = totalPages;
      if (currentPage < 1) currentPage = 1;

      var start = (currentPage - 1) * itemsPerPage;
      var end = start + itemsPerPage;
      var pageCards = matched.slice(start, end);

      for (var j = 0; j < cards.length; j++) cards[j].classList.add('is-hidden');
      for (var k = 0; k < pageCards.length; k++) pageCards[k].classList.remove('is-hidden');

      if (elResultCount) elResultCount.textContent = String(total);

      if (elEmpty) elEmpty.hidden = total !== 0;

      if (updatePaginationUI) renderPagination(totalPages);
    }

    function clearAll() {
      elQ.value = '';
      if (elProcessWrap) {
        var inputs = elProcessWrap.querySelectorAll('input[type="checkbox"][data-rd-ml-process]');
        for (var i = 0; i < inputs.length; i++) inputs[i].checked = false;
      }
      currentPage = 1;
      if (enableUrlSync) setUrlState(pathname, { q: '', processes: [], page: currentPage });
      updateTypeCounts(readUIState());
      setActiveType('all');
      render(true, true);
    }

    function resetProcess() {
      if (elProcessWrap) {
        var inputs = elProcessWrap.querySelectorAll('input[type="checkbox"][data-rd-ml-process]');
        for (var i = 0; i < inputs.length; i++) inputs[i].checked = false;
      }
      applyUrlFromUI(true);
    }

    setUIFromUrl();
    updateTypeCounts(readUIState());
    render(true, true);

    if (elApply) elApply.addEventListener('click', function () { applyUrlFromUI(true); });
    if (elClear) elClear.addEventListener('click', clearAll);
    if (elResetProcess) elResetProcess.addEventListener('click', resetProcess);
    if (elProcessWrap) elProcessWrap.addEventListener('change', function () { applyUrlFromUI(true); });
    if (elPagePrev) elPagePrev.addEventListener('click', function () { setPage(currentPage - 1); });
    if (elPageNext) elPageNext.addEventListener('click', function () { setPage(currentPage + 1); });

    elQ.addEventListener(
      'input',
      debounce(function () {
        applyUrlFromUI(true);
      }, 180)
    );

    if (enableUrlSync) {
      window.addEventListener('popstate', function () {
        setUIFromUrl();
        updateTypeCounts(readUIState());
        render(true, true);
      });
    }
  }

  function initAll(container) {
    var root = container || document;
    var els = root.querySelectorAll('section[data-rd-material-library]');
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
    window.elementorFrontend.hooks.addAction('frontend/element_ready/rd-material-library.default', function ($scope) {
      var el = $scope && $scope[0] ? $scope[0] : null;
      if (!el) return;
      initAll(el);
    });
  }
})();

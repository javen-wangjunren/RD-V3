/* ============================================================
   RD Site Header — 前端交互（实例隔离）
   - 根节点 [data-rd-header]，data-rd-header-init 防重复初始化
   - 全部查找限定在 root 内，不操作全局 DOM
   ============================================================ */

(function () {
	'use strict';

	function initHeader(root) {
		if (root.dataset.rdHeaderInit === '1') {
			return;
		}
		root.dataset.rdHeaderInit = '1';

		var navbar = root.querySelector('.rd-header__navbar');
		var toggle = root.querySelector('.rd-header__toggle');
		var navList = root.querySelector('.rd-header__nav');
		var items = Array.prototype.slice.call(root.querySelectorAll('.rd-header__item'));

		function closeAll() {
			items.forEach(function (item) {
				item.classList.remove('is-open');
				var mega = item.querySelector('.rd-header__mega');
				if (mega) {
					mega.classList.remove('is-open');
				}
				var label = item.querySelector('.rd-header__label');
				if (label) {
					label.setAttribute('aria-expanded', 'false');
				}
			});
			if (navList && navList.classList.contains('is-active')) {
				navList.classList.remove('is-active');
				if (toggle) {
					toggle.setAttribute('aria-expanded', 'false');
				}
			}
		}

		// 桌面：点击 label 展开/收起 Mega（点击其它菜单时互斥）
		items.forEach(function (item) {
			var label = item.querySelector('.rd-header__label');
			if (!label) {
				return;
			}
			label.addEventListener('click', function (e) {
				var mega = item.querySelector('.rd-header__mega');
				if (!mega) {
					return;
				}
				e.preventDefault();

				var wasOpen = item.classList.contains('is-open');
				closeAll();
				if (!wasOpen) {
					item.classList.add('is-open');
					mega.classList.add('is-open');
					label.setAttribute('aria-expanded', 'true');
				}
			});
		});

		// 外点关闭
		document.addEventListener('click', function (e) {
			if (!root.contains(e.target)) {
				closeAll();
			}
		});

		// Esc 关闭
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' || e.keyCode === 27) {
				closeAll();
			}
		});

		// 移动端：hamburger 抽屉
		if (toggle && navList) {
			toggle.addEventListener('click', function (e) {
				e.stopPropagation();
				var isActive = navList.classList.toggle('is-active');
				toggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
			});
		}

		// ---------- Capabilities tab ----------
		var capTabs = Array.prototype.slice.call(root.querySelectorAll('.cap-tab[data-cap-tab]'));
		var capPanels = Array.prototype.slice.call(root.querySelectorAll('.cap-panel[data-cap-panel]'));
		var capVisuals = Array.prototype.slice.call(root.querySelectorAll('.cap-visual-img[data-cap-visual]'));

		function activateCapTab(key) {
			capTabs.forEach(function (tab) {
				var isActive = tab.getAttribute('data-cap-tab') === key;
				tab.classList.toggle('is-active', isActive);
				tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
			});
			capPanels.forEach(function (panel) {
				panel.classList.toggle('is-active', panel.getAttribute('data-cap-panel') === key);
			});
			capVisuals.forEach(function (img) {
				img.classList.toggle('is-active', img.getAttribute('data-cap-visual') === key);
			});
		}

		capTabs.forEach(function (tab) {
			tab.addEventListener('mouseenter', function () {
				activateCapTab(tab.getAttribute('data-cap-tab'));
			});
			tab.addEventListener('focus', function () {
				activateCapTab(tab.getAttribute('data-cap-tab'));
			});
			tab.addEventListener('click', function () {
				activateCapTab(tab.getAttribute('data-cap-tab'));
			});
		});

		// ---------- Solutions tab ----------
		var solTabs = Array.prototype.slice.call(root.querySelectorAll('.sol-tab[data-sol-tab]'));
		var solPanels = Array.prototype.slice.call(root.querySelectorAll('.sol-panel[data-sol-panel]'));
		var solVisuals = Array.prototype.slice.call(root.querySelectorAll('.sol-visual-img[data-sol-visual]'));

		function activateSolTab(key) {
			solTabs.forEach(function (tab) {
				var isActive = tab.getAttribute('data-sol-tab') === key;
				tab.classList.toggle('is-active', isActive);
				tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
			});
			solPanels.forEach(function (panel) {
				panel.classList.toggle('is-active', panel.getAttribute('data-sol-panel') === key);
			});
			solVisuals.forEach(function (img) {
				img.classList.toggle('is-active', img.getAttribute('data-sol-visual') === key);
			});
		}

		solTabs.forEach(function (tab) {
			tab.addEventListener('mouseenter', function () {
				activateSolTab(tab.getAttribute('data-sol-tab'));
			});
			tab.addEventListener('focus', function () {
				activateSolTab(tab.getAttribute('data-sol-tab'));
			});
			tab.addEventListener('click', function () {
				activateSolTab(tab.getAttribute('data-sol-tab'));
			});
		});

		// 保留引用防止被 GC（navbar 供将来扩展）
		root.__rdHeaderNav = navbar;
	}

	function initAll() {
		Array.prototype.slice.call(document.querySelectorAll('[data-rd-header]')).forEach(initHeader);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAll);
	} else {
		initAll();
	}
})();

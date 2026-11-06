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

		function closeMegas() {
			items.forEach(function (item) {
				item.classList.remove('is-open');
				var mega = item.querySelector('.rd-header__mega');
				if (mega) {
					mega.classList.remove('is-open');
					resetDrilldown(mega);
				}
				var label = item.querySelector('.rd-header__label');
				if (label) {
					label.setAttribute('aria-expanded', 'false');
				}
			});
		}

		function closeDrawer() {
			if (navList) {
				navList.classList.remove('is-active');
			}
			if (toggle) {
				toggle.setAttribute('aria-expanded', 'false');
			}
			document.body.classList.remove('rd-header-lock');
		}

		function closeAll() {
			closeMegas();
			closeDrawer();
		}

		// 移动端二级视图：返回分类列表，清空当前分类内容
		function resetDrilldown(mega) {
			if (!mega) {
				return;
			}
			var head = mega.querySelector('.rd-drill-head');
			if (head) {
				head.classList.remove('is-active');
			}
			var title = mega.querySelector('.rd-drill-title');
			if (title) {
				title.textContent = '';
			}
			Array.prototype.slice.call(mega.querySelectorAll('.cap-tab.is-open, .sol-tab.is-open, .cap-panel.is-mobile-open, .sol-panel.is-mobile-open')).forEach(function (el) {
				el.classList.remove('is-open');
				el.classList.remove('is-mobile-open');
			});
		}

		Array.prototype.slice.call(root.querySelectorAll('.rd-drill-back')).forEach(function (back) {
			back.addEventListener('click', function () {
				resetDrilldown(back.closest('.rd-header__mega'));
			});
		});

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
				closeMegas();
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
				document.body.classList.toggle('rd-header-lock', isActive);
			});
		}

		// 视口回到桌面宽度时，收起抽屉并解除滚动锁
		window.addEventListener('resize', function () {
			if (window.innerWidth > 1150) {
				closeDrawer();
				items.forEach(function (item) {
					resetDrilldown(item.querySelector('.rd-header__mega'));
				});
			}
		});

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
			tab.addEventListener('click', function (e) {
				if (window.innerWidth <= 1150) {
					// 移动端二级视图：点分类后原地展示对应服务卡片
					e.preventDefault();
					var key = tab.getAttribute('data-cap-tab');
					var panel = root.querySelector('.cap-panel[data-cap-panel="' + key + '"]');
					var head = root.querySelector('.menu-body-capabilities .rd-drill-head');
					if (!panel || !head) {
						return;
					}
					capTabs.forEach(function (t) { t.classList.remove('is-open'); });
					capPanels.forEach(function (p) { p.classList.remove('is-mobile-open'); });
					tab.classList.add('is-open');
					panel.classList.add('is-mobile-open');
					head.classList.add('is-active');
					var title = head.querySelector('.rd-drill-title');
					if (title) {
						title.textContent = tab.textContent.trim();
					}
					head.scrollIntoView({ block: 'start' });
					return;
				}
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
			tab.addEventListener('click', function (e) {
				if (window.innerWidth <= 1150) {
					// 移动端二级视图：点分类后原地展示对应服务卡片
					e.preventDefault();
					var key = tab.getAttribute('data-sol-tab');
					var panel = root.querySelector('.sol-panel[data-sol-panel="' + key + '"]');
					var head = root.querySelector('.menu-body-solutions .rd-drill-head');
					if (!panel || !head) {
						return;
					}
					solTabs.forEach(function (t) { t.classList.remove('is-open'); });
					solPanels.forEach(function (p) { p.classList.remove('is-mobile-open'); });
					tab.classList.add('is-open');
					panel.classList.add('is-mobile-open');
					head.classList.add('is-active');
					var title = head.querySelector('.rd-drill-title');
					if (title) {
						title.textContent = tab.textContent.trim();
					}
					head.scrollIntoView({ block: 'start' });
					return;
				}
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

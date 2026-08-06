/**
 * RD Site Header — 后台表单交互
 *
 * 与 admin/site-header-admin.php 的标记契约对齐：
 * - 折叠卡片：.rd-collapse > .rd-collapse-head[data-rd-collapse-head]（默认 index 0 展开）
 * - 添加行：button[data-rd-add] → 克隆兄弟 template[data-rd-template]，__i__ 替换为 max+1
 * - 删除行：button[data-rd-remove]（定位 [data-rd-row] / .rd-card-sub / .rd-collapse）
 * - 排序：button[data-rd-sort=up|down]（仅 [data-rd-sortable] repeater 内）
 * - 条件渲染：select[data-rd-branch] 控制同容器内 [data-rd-branch-block] 显隐
 * - 计数徽标：[data-rd-count]
 *
 * 不使用全局 ID，全部 data-* + class 定位（符合项目 HTML 模块规范）。
 */
(function () {
	'use strict';

	/**
	 * 从表单字段名中，提取与模板 __i__ 处于同一位置的数字索引。
	 * 模板行与现有行的字段名结构一致，仅索引位不同，故用位置对齐。
	 *
	 * @param {string} tplName 模板行第一个字段的 name（含 __i__）
	 * @param {string} rowName 现有行第一个字段的 name
	 * @return {number|null} 索引或 null
	 */
	function rowIndexAtPlaceholder(tplName, rowName) {
		var pos = tplName.indexOf('__i__');
		if (pos < 0) {
			return null;
		}
		var m = rowName.slice(pos).match(/^\d+/);
		return m ? parseInt(m[0], 10) : null;
	}

	/**
	 * 取 repeater 下一可用索引：现有行最大索引 + 1（避免删除造成缺号后重复）。
	 *
	 * @param {Element} rowsEl .rd-repeater-rows
	 * @param {Element} template template[data-rd-template]
	 * @return {number}
	 */
	function nextIndex(rowsEl, template) {
		var tplField = template.querySelector('input, select, textarea');
		var tplName = tplField ? tplField.name : '';
		var max = -1;
		var rows = rowsEl.children;
		for (var i = 0; i < rows.length; i++) {
			var field = rows[i].querySelector('input, select, textarea');
			if (!field) {
				continue;
			}
			var idx = rowIndexAtPlaceholder(tplName, field.name);
			if (idx !== null && idx > max) {
				max = idx;
			}
		}
		return max + 1;
	}

	/**
	 * 更新 repeater 标题旁的计数徽标。
	 *
	 * @param {Element} repeater [data-rd-repeater]
	 */
	function updateCount(repeater) {
		var countEl = repeater.querySelector('.rd-repeater-head [data-rd-count]');
		if (!countEl) {
			return;
		}
		var rowsEl = null;
		var children = repeater.children;
		for (var i = 0; i < children.length; i++) {
			if (children[i].classList.contains('rd-repeater-rows')) {
				rowsEl = children[i];
				break;
			}
		}
		countEl.textContent = String(rowsEl ? rowsEl.children.length : 0);
	}

	/**
	 * 根据 select 的值，切换同一作用域容器内的分支区块显隐。
	 *
	 * @param {HTMLSelectElement} select select[data-rd-branch]
	 */
	function applyBranch(select) {
		// 分支区块与 select 位于同一卡片内容容器内（.rd-card-body / .rd-collapse-body）
		var scope = select.closest('.rd-card-body, .rd-collapse-body');
		if (!scope) {
			return;
		}
		var value = select.value;
		var blocks = scope.querySelectorAll('[data-rd-branch-block]');
		for (var i = 0; i < blocks.length; i++) {
			blocks[i].style.display = blocks[i].getAttribute('data-rd-branch-value') === value ? '' : 'none';
		}
	}

	/**
	 * 同步新增节点内的条件渲染初始状态。
	 *
	 * @param {Element} root 新增的节点
	 */
	function syncRowBranch(root) {
		var selects = root.querySelectorAll('[data-rd-branch]');
		for (var i = 0; i < selects.length; i++) {
			applyBranch(selects[i]);
		}
	}

	/**
	 * 添加行：克隆 template，__i__ 全部替换为新索引，插入行容器。
	 *
	 * @param {Element} btn button[data-rd-add]
	 */
	function handleAdd(btn) {
		var repeater = btn.closest('[data-rd-repeater]');
		if (!repeater) {
			return;
		}
		var template = repeater.querySelector('template[data-rd-template]');
		var rowsEl = null;
		var children = repeater.children;
		for (var i = 0; i < children.length; i++) {
			if (children[i].classList.contains('rd-repeater-rows')) {
				rowsEl = children[i];
				break;
			}
		}
		if (!template || !rowsEl) {
			return;
		}
		var idx = nextIndex(rowsEl, template);

		// 仅替换"行级"占位符：以模板第一个字段名中 __i__ 的位置为准，
		// 嵌套 repeater（sections→tabs→cards…）更深层的 __i__ 保留不动。
		var tplField = template.querySelector('input, select, textarea');
		var pos = tplField && tplField.name ? tplField.name.indexOf('__i__') : -1;
		var frag = document.importNode(template.content, true);
		if (pos >= 0) {
			var fields = frag.querySelectorAll('input, select, textarea');
			for (var f = 0; f < fields.length; f++) {
				var name = fields[f].getAttribute('name');
				if (name && name.slice(pos, pos + 4) === '__i__') {
					fields[f].setAttribute('name', name.slice(0, pos) + String(idx) + name.slice(pos + 4));
				}
			}
		}
		rowsEl.appendChild(frag);

		var node = rowsEl.lastElementChild;
		if (node) {
			syncRowBranch(node);
		}
		updateCount(repeater);
	}

	/**
	 * 删除行：定位最近的 [data-rd-row] / .rd-card-sub / .rd-collapse 并移除。
	 *
	 * @param {Element} btn button[data-rd-remove]
	 */
	function handleRemove(btn) {
		var row = btn.closest('[data-rd-row], .rd-card-sub, .rd-collapse');
		if (!row) {
			return;
		}
		var repeater = row.closest('[data-rd-repeater]');
		row.remove();
		if (repeater) {
			updateCount(repeater);
		}
	}

	/**
	 * 上移 / 下移：仅 [data-rd-sortable] repeater 内的行。
	 *
	 * @param {Element} btn button[data-rd-sort]
	 */
	function handleSort(btn) {
		var repeater = btn.closest('[data-rd-sortable]');
		if (!repeater) {
			return;
		}
		var rowsEl = null;
		var children = repeater.children;
		for (var i = 0; i < children.length; i++) {
			if (children[i].classList.contains('rd-repeater-rows')) {
				rowsEl = children[i];
				break;
			}
		}
		if (!rowsEl) {
			return;
		}
		// 排序的行是 .rd-collapse 卡片（Section / Tab）
		var row = btn.closest('.rd-collapse');
		if (!row || row.parentNode !== rowsEl) {
			return;
		}
		var dir = btn.getAttribute('data-rd-sort');
		if (dir === 'up' && row.previousElementSibling) {
			rowsEl.insertBefore(row, row.previousElementSibling);
		} else if (dir === 'down' && row.nextElementSibling) {
			rowsEl.insertBefore(row.nextElementSibling, row);
		} else {
			return;
		}
		updateCount(repeater);
	}

	/**
	 * 折叠 / 展开卡片。
	 *
	 * @param {Element} head [data-rd-collapse-head]
	 */
	function toggleCollapse(head) {
		var collapse = head.closest('.rd-collapse');
		if (collapse) {
			collapse.classList.toggle('rd-collapse-open');
		}
	}

	/* 名称匹配：仅 Nav Item 一层的 label / mega_type（不含嵌套 repeater 的同名段） */
	var NAV_LABEL_RE = /^rd_site_header\[nav_items\]\[\d+\]\[label\]$/;
	var NAV_TYPE_RE = /^rd_site_header\[nav_items\]\[\d+\]\[mega_type\]$/;

	function bindEvents(form) {
		// 点击：排序 > 删除 > 添加 > 折叠（排序按钮在折叠头内，需优先处理）
		form.addEventListener('click', function (e) {
			var sortBtn = e.target.closest('[data-rd-sort]');
			if (sortBtn) {
				e.stopPropagation();
				handleSort(sortBtn);
				return;
			}
			var removeBtn = e.target.closest('[data-rd-remove]');
			if (removeBtn) {
				handleRemove(removeBtn);
				return;
			}
			var addBtn = e.target.closest('[data-rd-add]');
			if (addBtn) {
				handleAdd(addBtn);
				return;
			}
			var head = e.target.closest('[data-rd-collapse-head]');
			if (head) {
				toggleCollapse(head);
			}
		});

		// change：条件渲染 select + Nav Item 类型徽标同步
		form.addEventListener('change', function (e) {
			var target = e.target;
			if (target.closest && target.closest('[data-rd-branch]')) {
				applyBranch(target);
				return;
			}
			if (target.tagName === 'SELECT' && NAV_TYPE_RE.test(target.name)) {
				var card = target.closest('.rd-collapse');
				var badge = card ? card.querySelector('.rd-nav-type') : null;
				if (badge) {
					var opt = target.options[target.selectedIndex];
					badge.textContent = opt ? opt.text : target.value;
				}
			}
		});

		// input：Nav Item Label 实时同步到卡片头标题
		form.addEventListener('input', function (e) {
			var target = e.target;
			if (target.tagName === 'INPUT' && NAV_LABEL_RE.test(target.name)) {
				var card = target.closest('.rd-collapse');
				var title = card ? card.querySelector('.rd-nav-title') : null;
				if (title) {
					title.textContent = target.value || '(未命名)';
				}
			}
		});
	}

	function init() {
		var form = document.querySelector('.rd-header-admin form');
		if (!form) {
			return;
		}
		bindEvents(form);

		// 初始状态：按当前 select 值应用分支显隐（模板行同样生效）
		var selects = form.querySelectorAll('[data-rd-branch]');
		for (var i = 0; i < selects.length; i++) {
			applyBranch(selects[i]);
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();

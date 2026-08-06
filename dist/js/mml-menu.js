;(function (win, $, doc) {
	win.matchMediaWidth = 1025;
	var isBindHover = false;
	var isBindMobileClick = false;
	var menuToggleStatus = false;
	var menuHeight = $('#J_header').height();
	var isSticky = true;
	var isStickyOnMobile = true;
	// 是否 clone
	var isClone = false;
	// 是否自定义导航
	var hasTemplate = !!$('.has-template').length;
	var isSplitMenu = $('#J_header').hasClass('split-menu');

	// bind 导航在 PC 的 hover 事件
	function bindHover() {
		if (isBindHover) return
		$('.menu').on('mouseenter', '.menu-item', function(event) {
			var subMenu = $(this).find(' > .sub-menu')
			if (subMenu.length) {
				var scriptTpl = subMenu.find('script')
				if (scriptTpl.length) {
					subMenu.find('> li.menu-item').each(function(index, el) {
						$(el).html($(el).find(' > script').html())
					});
				}
				subMenu.addClass('active')
			}
		});
		$('.menu').on('mouseleave', '.menu-item', function(event) {
			var subMenu = $(this).find(' > .sub-menu')
		 	if (subMenu.length) {
		 		subMenu.removeClass('active')
		 	}
		});
		$('.menu').on('mouseleave', function() {
			$('.menu .sub-menu').removeClass('active')
		});
		// 兜底：离开整个 Header 时，关闭 SmartMenus 与 Elementor Mega Menu
		$('#J_header').on('mouseleave', function() {
			try {
				var sm = $('#menu-menu-header').data('smartmenus');
				if (sm && typeof sm.menuHideAll === 'function') {
					sm.menuHideAll();
				}
			} catch (e) {}
			$('.mml-ele-custom-menu.elementor-section-height-default-active').removeClass('elementor-section-height-default-active');
		});
		isBindHover = true;
	}
	// 解除 bind
	function unbindHover () {
		$('.menu').off('mouseenter', '.menu-item');
		$('.menu').off('mouseleave', '.menu-item');
		$('.menu').off('mouseleave');
		isBindHover = false
	}
	// bind 自定义导航在 mobile 的 click 事件
	function bindMobileClick() {
		if (isBindMobileClick) return
		$('.menu .menu-item .menu-arrow').on('click', function(event) {
			event.preventDefault();
			var subMenu = $(this).closest('.menu-item').find(' > .sub-menu')
			if (subMenu.length) {
				if (!subMenu.hasClass('active')) {
					var scriptTpl = subMenu.find('script')
					if (scriptTpl.length) {
						subMenu.find('> li.menu-item').each(function(index, el) {
							$(el).html($(el).find(' > script').html())
						});
					}
					clearSubMenuActive($(this).closest('.menu-item'))
					subMenu.addClass('active')
				} else {
				 	subMenu.removeClass('active')
				}
			}
		});
		isBindMobileClick = true
	}
	// 解除 bind
	function unbindMobileClick() {
		$('.menu .menu-item .menu-arrow').off('click');
		isBindMobileClick = false;
	}
	// 清除同级 active
	function clearSubMenuActive (activeMenu) {
		activeMenu.siblings('li.menu-item').removeClass('active').find('.sub-menu').removeClass('active')
		if (isSplitMenu) {
			activeMenu.closest('.menu-container').siblings('.menu-container').find('.sub-menu').removeClass('active')
		}
	}
	// clone 导航，生成侧边导航栏
	function cloneMenu() {
		if (hasTemplate) return;

		var splitMenu = null;
		var menu = $('.m-nav .menu-container:first').clone(false);

		if (isSplitMenu) {
			splitMenu = $('.m-nav .menu-container:last ul').html();
		}
		if (splitMenu) {
			menu.find('ul.menu').append(splitMenu)
		}
		$('#J_slideMenu .menu-wrapper').append(menu)

		isClone = true
	};
	// 显示侧边导航
	function menuToggle () {
		var duration = 300;
		if (!menuToggleStatus) {
			menuToggleStatus = true;
			$('#J_slideMask').animate({ 'opacity': 1 }, duration).css('display', 'block');;
			$('body').animate({ 'left': -125 }, duration);
			$('#J_slideMenu').animate({'right': 0}, duration);
		} else {
			menuToggleStatus = false;
			$('#J_slideMask').animate({'opacity': 0 }, duration, function() {
				$('#J_slideMask').css('display', 'none');
			});
			$('body').animate({ 'left': 0 }, duration);
			$('#J_slideMenu').animate({'right': -250}, duration);
		}
	}

	function handleOrientationChange(mql) {
		if (mql.matches) {
			if (!isClone) cloneMenu()
		} else if (hasTemplate) {
			$('.menu-container').removeAttr('style');
			resetHeaderMargin(isHidden(document.querySelector('.menu-container')))
		} else {
			if (menuToggleStatus) menuToggle();
		}
	};

	// 给导航添加 sticky
	function addSticky () {
		if (isSticky && $(win).scrollTop() >= menuHeight && (isStickyOnMobile || $(win).width() > win.matchMediaWidth)) {
			if (!$('#J_header').hasClass('sticky-header')) {
				$('#J_header').addClass('sticky-header');
				$('.m-header-placeholder').height(menuHeight);
				$('.m-header-bd').css('top', '-60px').animate({top: 0}, 300);
			}
		} else {
			$('#J_header').removeClass('sticky-header');
			$('.m-header-placeholder').height(0);
		}
	}

	// 如果自定义导航的 header 的背景色为透明，则判断 banner 是否设置了负边距覆盖在 header 之下
	function getHeaderHeight() {
		var headerHeight = $('#J_header').height()
		var bannerDom = $('#J_header').closest('.global-wrap').next()
		var bannerDomTop = $(bannerDom).offset().top
		// 管理员登录后页面会生成topbar，topbar高度会根据屏幕变为 32 或 46
		if ((bannerDomTop === 0 || bannerDomTop === 32 || bannerDomTop === 46) && $('.has-template').length) {
			return headerHeight
		}
		return 0
	}

	// 判断元素是否隐藏 当元素 display 设置为 none 时， offsetParent 返回 null
	function isHidden(el) {
	  return (el.offsetParent === null);
	}

	// 重置 banner margin-top 值
	function resetHeaderMargin(menuIsHidden) {
		var bgColor = $('.sub-menu').css('backgroundColor')
		bgColor = bgColor === 'rgba(0,0,0,0)' ? 'rgba(255,255,255,1)' : bgColor;
		var bannerDom = $('#J_header').closest('.global-wrap').next()
		var headerHeaght = getHeaderHeight()

		if (headerHeaght > 0 && menuIsHidden ) {
			$('#J_header').css('backgroundColor', bgColor)
			$('#J_header').css('margin-bottom', headerHeaght);
		} else {
			$('#J_header').css('backgroundColor', 'rgba(0,0,0,0)')
			$('#J_header').css('margin-bottom', 0);
		}
	}

	$(document).ready(function () {

		// 显示子导航
		$(win).resize(function(event) {
			if ($(window).width() >= window.matchMediaWidth) {
				unbindMobileClick()
				bindHover()
			} else {
				unbindHover()
				bindMobileClick()
			}
		});

		if ($(win).width() >= win.matchMediaWidth) {
			bindHover()
		} else {
			bindMobileClick()
		}
		$(document).on('keydown', function(e) {
			if (e.key === 'Escape') {
				$('.menu .sub-menu').removeClass('active')
				try {
					var sm = $('#menu-menu-header').data('smartmenus');
					if (sm && typeof sm.menuHideAll === 'function') {
						sm.menuHideAll();
					}
				} catch (err) {}
				$('.mml-ele-custom-menu.elementor-section-height-default-active').removeClass('elementor-section-height-default-active');
			}
		});
		$(document).on('click', function(e) {
			if ($(e.target).closest('.menu').length === 0) {
				$('.menu .sub-menu').removeClass('active')
				try {
					var sm = $('#menu-menu-header').data('smartmenus');
					if (sm && typeof sm.menuHideAll === 'function') {
						sm.menuHideAll();
					}
				} catch (err) {}
				$('.mml-ele-custom-menu.elementor-section-height-default-active').removeClass('elementor-section-height-default-active');
			}
		});

		// bind 侧边导航展开子导航
		$('#J_slideMenu').on('click', '.menu-arrow', function(event) {
			var parent = $(this).closest('li.menu-item');
			if (!parent.hasClass('active')) {
				parent.addClass('active').find(' > ul.sub-menu').slideToggle(100);
			} else {
				parent.removeClass('active').find(' > ul.sub-menu').slideToggle(100);
			}
			event.preventDefault()
		});

		// 展开导航
		$('#J_responsiveMenuToggle, #J_slideClose').click(function(event) {
			// 非自定义导航，则开启侧边栏导航
			if (!hasTemplate) {
				menuToggle()
			} else {
				var menuIsHidden = isHidden(document.querySelector('.menu-container'))
				resetHeaderMargin(menuIsHidden)
				if (!menuIsHidden) {
					$('.menu-container').css({
						height: '0',
						overflow: 'hidden',
						display: 'none'
					});
					$('.menu-container').find('.menu-level-2').removeClass('active')
				} else {
					$('.menu-container').css({
						height: 'auto',
						overflow: 'visible',
						display: 'block'
					});
				}
			}
		});

		// 监听屏幕变化, 屏幕大于1024的时候，关闭侧边导航
		var mql = window.matchMedia('(max-width: '+ (win.matchMediaWidth)  +'px)');
		mql.addListener(handleOrientationChange);
		handleOrientationChange(mql);

		$(win).scroll(function(event) {
			addSticky()
		});

		addSticky()
	})


})(window, jQuery, document);

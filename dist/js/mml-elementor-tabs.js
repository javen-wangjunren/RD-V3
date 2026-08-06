;(function () {
	var $
	function init(dom) {
		// 可能有用的类名
		// elementor-widget-mml-tab-title
		// section mml-ele-tab
		// elementor-element-63c976b
		// mml-ele-tab-content

		// console.log(dom)
		// var $widget = $('.elementor-widget-mml-tab-title', dom).eq(0) // elementor widget
		// var data = $widget.data()
		// var id = data.id
		// console.log(id)

		var $titles, $contents

		$titles = $('.mml-ele-tab-title-li', dom)
		$contents = $('.mml-ele-tab-content', dom)

		$titles.click(function () {
			var $this = $(this)
			$titles.removeClass('active')
			$this.addClass('active')
			$contents.removeClass('active')
			$contents.eq($this.data().index).addClass('active')
			// setTimeout(function () {
			// 	try {
			// 		var ev = document.createEvent('Event');
			// 		ev.initEvent('resize', true, true);
			// 		window.dispatchEvent(ev);
			// 	} catch (e) {
			// 	}
			// }, 1);
		})

		$titles.eq(0).click()
	}
	window.addEventListener('load', function () {
		if (!window.jQuery) {
			console.warn('[mml-elementor-tabs.js] 找不到 window.jQuery')
			return
		}
		$ = window.jQuery
		$('section.mml-ele-tab').each(function (index, item) {
			init(item)
		})
	})
})();

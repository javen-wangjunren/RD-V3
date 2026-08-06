;(function($, win){
	$(document).ready(function() {
		$('body').on('click', '.mml-faq-item .mml-faq-item-hd', function(event) {
			var faqItem = $(this).closest('.mml-faq-item');
			var faqParent = faqItem.closest('.mml-faq');
			if (faqItem.hasClass('active')) {
				faqItem.removeClass('active')
				faqItem.find('.mml-faq-item-bd').slideToggle(100)
			} else {
				faqParent.find('.mml-faq-item').each(function(index, el) {
					if ($(el).hasClass('active')) {
						$(el).removeClass('active').find('.mml-faq-item-bd').slideToggle(100)
					}
				});
				faqItem.addClass('active')
				faqItem.find('.mml-faq-item-bd').slideToggle(100)
			}
		});
		$('.mml-faq').each(function(index, el) {
			// 在激活第一个item 前清除一遍所有的item的激活状态
			$(el).find('.mml-faq-item').removeClass('active').find('.mml-faq-item-bd').hide()

			var fristItem = $(el).find('.mml-faq-item').eq(0);
			fristItem.addClass('active')
			fristItem.find('.mml-faq-item-bd').slideToggle(100)
		});
	});
})(jQuery, window)
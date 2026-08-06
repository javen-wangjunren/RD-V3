<ul class="contact-way">
	<?php
		// HTML 结构可以在 functions.php 里进行修改。 搜索对应的方法名即可找到。
		// 参数是图标的 css class 。 参数可省略，不会报错。 开发过程中注意修改这里。
		// 已进行判断，如果没有值，则不输出。
		mml_show_email1('fas fa-envelope');
		mml_show_email2('fas fa-envelope');
		mml_show_mobile1('fas fa-phone');
		mml_show_mobile2('fas fa-phone');
		mml_show_telephone1('fas fa-tty');
		mml_show_telephone2('fas fa-tty');
		mml_show_fax1('fas fa-fax');
		mml_show_fax2('fas fa-fax');
		mml_show_whatsapp('fas fa-whatsapp');
		mml_show_address('fas fa-location-arrow');
	?>
</ul>
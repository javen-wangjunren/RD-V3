<?php

/*
<?php mtf_section('V1_Portfolio_001', 'portfolio-001', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'h2_color'			=> '#222',
	'h5_color'			=> '#555',
	'page_color'		=> ['_' => '#9d9d9d', '_:hover' => '#03a57b']
], [
	'title' 	=> 'Relevant Project Portfolios',
	'desc'		=> '<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>',
	'products'	=> [
		'column'	=> 3,
		'psize'		=> 6,
		'pnow'		=> 2,
		'ptotal'	=> 8
	],
	'param'		=> [
		'url'	=> '/wp-common/api-mock.php',
		'data'	=> [
			'psize'	=> 6,
			'pid'	=> 1
		]
	]
]); ?>
*/

class V1_Portfolio_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'class'				=> '',
			'bg_color' 			=> '',
			'bg_image' 			=> '',
			'margin_top' 		=> '',
			'padding_top' 		=> '',
			'padding_bottom' 	=> '',
			'margin_bottom' 	=> '',
			'custom_css' 		=> '',
			'desc_color'		=> '#808080',
			'h2_color'			=> '#222',
			'h5_color'			=> '#555',
			'page_color'		=> ['_' => '#9d9d9d', '_:hover' => '#03a57b']
		]);
	}

	public function style () {
		?>
			/* insert style start */
			.<?php $this->eid(); ?> {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .portfolios > li {
				margin: 30px 10px 20px;
			}
			.<?php $this->eid(); ?> h5 {
				margin-top: 20px;
				color: <?php $this->est('h5_color'); ?>;
			}
			.<?php $this->eid(); ?> .pagination {
				margin-top: 20px;
			}
			.<?php $this->eid(); ?> .mml-page,
			.<?php $this->eid(); ?> .mml-ellipsis{
				margin: 5px;
			}
			.<?php $this->eid(); ?> .mml-page-prev,
			.<?php $this->eid(); ?> .mml-page-next{
				color: <?php $this->est('page_color._'); ?>;
			}
			.<?php $this->eid(); ?> .mml-current,
			.<?php $this->eid(); ?> .mml-page:hover{
				color: <?php $this->est('page_color._:hover'); ?>;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
		$(function(){
			var container = $('.<?php $this->eid(); ?> .container ul');
			var $pagination = $('.<?php $this->eid(); ?> .pagination');
			var total = <?php echo (int)$this->gco('products.ptotal'); ?>;
			var api = '<?php $this->eco('param.url'); ?>';
			var data = JSON.parse('<?php echo json_encode($this->gco('param.data')); ?>');
			var pnow = <?php echo (int)$this->gco('products.pnow'); ?>;
	
			$pagination.mmlpage(pnow, total, {
				prev: '<i class="fas fa-chevron-left"></i>',
				next: '<i class="fas fa-chevron-right"></i>',
				activeClass: 'mml-current',
				click: function(p){
					req(p);
				}
			});
	
			var req = function(p){
				data.pid = p;
				$.ajax({
					type: "GET",
					url: api,
					data: data,
					dataType: "JSON",
					success: function( res ){
						$pagination.mmlpage(p, total);
						render(res);
					}
				})
			};
	
			var render = function(res) {
				var htm = '';
				if (res) {
					for(var i in res) {
						htm += '<li>\
									<a href="'+res[i].link+'">\
										<div class="mml-image">\
											<img src="'+res[i].image+'" alt="'+res[i].alt+'">\
										</div>\
										<h5>'+res[i].title+'</h5>\
									</a>\
								</li>';
					}
				}
				container.html(htm);
			};

			req(pnow);
		});

})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<?php $this->eco('desc'); ?>
					<?php } ?>
					<ul class="portfolios mml-cols-<?php echo (int)$this->gco('products.column') ?: 3; ?>"></ul>
					<div class="pagination"></div>
				</div>
			</div>
		<?php
	}
}

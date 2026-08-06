<?php

/*
	<?php
	?>
*/

class V1_Search_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
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
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.v1_search_001 .mml-text {
				margin-bottom: 50px;
			}

			.v1_search_001 .mml-text h2 {
				color: #2a3344;
				font-size: 36px;
				margin-bottom: 30px;
			}

			.v1_search_001 .mml-text p {
				margin: 0 auto;
				max-width: 780px;
				color: #808080;
			}

			.v1_search_001 .mml-text p a {
				color: #2d72da;
			}

			.v1_search_001 .item1 {
				overflow: hidden;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				width: 100%;
				height: 60px;
				-webkit-border-radius: 30px;
						border-radius: 30px;
				border: solid 2px #2a3344;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				padding: 0 5px 0 30px;
				margin: 20px 0;
			}

			.v1_search_001 .item1 input {
				display: block;
				width: 100%;
				height: 100%;
				border: none;
				background: none;
				outline: none;
			}

			.v1_search_001 .item1 input::-webkit-input-placeholder {
				color: #2a3344;
				font-weight: 600;
			}

			.v1_search_001 .item1 input:-moz-placeholder {
				color: #2a3344;
				font-weight: 600;
			}

			.v1_search_001 .item1 input::-moz-placeholder {
				color: #2a3344;
				font-weight: 600;
			}

			.v1_search_001 .item1 input:-ms-input-placeholder {
				color: #2a3344;
				font-weight: 600;
			}

			.v1_search_001 .item1 .hr {
				width: 2px;
				height: 32px;
				background-color: #2a3344;
			}

			.v1_search_001 .item1 .search-btn {
				cursor: pointer;
				margin: 0;
				height: 100%;
				width: 10%;
				max-width: 55px !important;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
			}

			.v1_search_001 .item1 .search-btn i {
				font-size: 14px;
				color: #2a3344;
			}

			.v1_search_001 .item2 {
				overflow: hidden;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				width: 100%;
				height: 60px;
				background-color: #f4f5f5;
				-webkit-border-radius: 30px;
						border-radius: 30px;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				padding: 0 0 0 30px;
				margin: 20px 0;
			}

			.v1_search_001 .item2 input {
				display: block;
				width: 100%;
				height: 100%;
				border: none;
				background: none;
				outline: none;
			}

			.v1_search_001 .item2 input::-webkit-input-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item2 input:-moz-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item2 input::-moz-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item2 input:-ms-input-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item2 .search-btn {
				cursor: pointer;
				margin: 0;
				height: 100%;
				width: 103px;
				max-width: 103px !important;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				background-color: #2a3344;
				-webkit-border-radius: 0px 30px 30px 0px;
						border-radius: 0px 30px 30px 0px;
			}

			.v1_search_001 .item2 .search-btn i {
				font-size: 14px;
				color: #ffffff;
			}

			.v1_search_001 .item3 {
				overflow: hidden;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				width: 100%;
				height: 60px;
				background-color: #f4f5f5;
				-webkit-border-radius: 30px;
						border-radius: 30px;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				padding: 0 0 0 30px;
				margin: 20px 0;
			}

			.v1_search_001 .item3 input {
				display: block;
				width: 100%;
				height: 100%;
				border: none;
				background: none;
				outline: none;
			}

			.v1_search_001 .item3 input::-webkit-input-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item3 input:-moz-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item3 input::-moz-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item3 input:-ms-input-placeholder {
				color: #b3b3b3;
				font-weight: 600;
			}

			.v1_search_001 .item3 .search-btn {
				cursor: pointer;
				margin: 0;
				height: 100%;
				width: 97px;
				max-width: 97px !important;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				background-color: #2a3344;
				-webkit-border-radius: 24px;
						border-radius: 24px;
			}

			.v1_search_001 .item3 .search-btn i {
				font-size: 14px;
				color: #ffffff;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>

		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start -->
				<div class="container">
					<div class="mml-text">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>An apology that there is   0  result here matching for your search item of *****. Please kindly check and search again, or <a href="#">contact us</a> for a free consultation.</p>
					</div>
					<div class="mml-list">
						<div class="item1">
							<input type="text" placeholder="search" />
							<hr class="hr" />
							<span class="search-btn">
								<i class="fa fa-search"></i>
							</span>
						</div>
						<div class="item2">
							<input type="text" placeholder="search" />
							<span class="search-btn">
								<i class="fa fa-search"></i>
							</span>
						</div>
						<div class="item3">
							<input type="text" placeholder="search" />
							<span class="search-btn">
								<i class="fa fa-search"></i>
							</span>
						</div>
					</div>
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}

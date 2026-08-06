<?php

/*
	<?php
	?>
*/

class V2_Feature_018  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .list > li{
				background-color:#03a679;
			}
			.<?php $this->eid(); ?> .list .icon{
				border-color:rgba(255,255,255,0.5);
				color: #ffffff;

			}
			.<?php $this->eid(); ?> .list > li:hover{
				background-color:#35b894;
			}
			.<?php $this->eid(); ?> .list > li:hover .icon{
				background-color: #ffffff;
				color:#03a679;

			}
			.<?php $this->eid(); ?> .list h4{
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .list p{
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .link{
				color: #ffffff;
				text-decoration:underline;
				margin-top:10px;

			}
			.<?php $this->eid(); ?> .link:hover{
				text-decoration:none;

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
				<div class="container">
					<ul class="list mml-cols-3">
						<li>
							<div class="icon">
								<i class="fas fa-gem"></i>
							</div>
							<!-- <img src="https://via.placeholder.com/62x62" alt=""> -->
							<h4>Heading 3</h4>
							<p>Only the RDS-approved goose down and duck down certified by the Control Union will be used here. We feel highly responsible when it comes to down sourcing. Dependable origin is ensured.</p>
							<a href="" class="link">Learn More >></a>
						</li>
						<li>
							<div class="icon">
								<i class="fas fa-gem"></i>
							</div>
							<!-- <img src="https://via.placeholder.com/62x62" alt=""> -->
							<h4>Heading 3</h4>
							<p>Only the RDS-approved goose down and duck down certified by the Control Union will be used here. We feel highly responsible when it comes to down sourcing. Dependable origin is ensured.</p>
							<a href="" class="link">Learn More >></a>
						</li>
						<li>
							<div class="icon">
								<i class="fas fa-gem"></i>
							</div>
							<!-- <img src="https://via.placeholder.com/62x62" alt=""> -->
							<h4>Heading 3</h4>
							<p>Only the RDS-approved goose down and duck down certified by the Control Union will be used here. We feel highly responsible when it comes to down sourcing. Dependable origin is ensured.</p>
							<a href="" class="link">Learn More >></a>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}

<?php
	function help_topic_sidebar() { 
		ob_start();
		?>
		<style>
			.table-heading-side{
				font-size: 18px;
				line-height: 24px;
				color: #EA543F;
			}
			.side-ques{
				font-size: 16px;
				line-height: 24px;
				padding: 8px 16px;
				margin-bottom: 10px;
			}
			.side-ques:hover{
				color: #EA543F;
				background: #FEF4EA;
			}
			.d-flex-all{
				display: flex;
			}
			.justify-content-between{
				justify-content: space-between;
			}
			.align-items-center{
				align-items: center;
			}
			.answer-que h3{
				font-size: 20px;
				line-height: 28px;
				font-weight: 500;
    			letter-spacing: 0.5px;
				padding-right: 16px;
			}
			.answer-que{
				padding: 8px 16px;
				position: relative;
			}
			.answer-que:hover{
				background: white;
				cursor: pointer;
				box-shadow: 0px 4px 4px 0px rgb(0 0 0 / 10%);
			}
			.answer-que:hover:after{
				content: "";
				display: block;
				width: 100%;
				height: 2px;
				background: red;
				margin-top: -2px;
				position: absolute;
				bottom: 0px;
				left: 0px;
			}
			.topic-content-area{
				padding: 32px;
				background: #F6F6F6;
				margin-bottom: 40px;
			}
		</style>
		<div class="fs-18 table-heading-side fw-700 font-bai">
			Table of Content
		</div>
		<div class="mt-24">
		</div>
		<?php
		$search_args = array(
			'post_type' => 'topic',
			'posts_per_page'    => -1,
		);
		$cuurentID = get_the_ID();
		$my_query = new WP_Query($search_args);
		while ($my_query->have_posts()) :  $my_query->the_post();
		?>
			<div class="side-ques <?php if($cuurentID == get_the_ID()){ echo 'activee'; }?>">
				<a href="<?php the_permalink();?>" class="d-flex-btw-ctr align-start justify-start">
					<div class="ps-6">
						<?php the_title();?>
					</div>
				</a>
			</div>
		<?php endwhile; wp_reset_postdata();?>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('help-topic-sidebar', 'help_topic_sidebar');
?>
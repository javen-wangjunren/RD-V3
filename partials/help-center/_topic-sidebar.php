<div class="fs-18 fw-700 font-bai">
	Table of Content
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
	<div class="mt-24 side-ques <?php if($cuurentID == get_the_ID()){ echo 'activee'; }?>">
		<a href="<?php the_permalink();?>" class="d-flex-btw-ctr align-start justify-start">
			<div class="ps-6">
				<?php the_title();?>
			</div>
		</a>
	</div>
<?php endwhile; wp_reset_postdata();?>
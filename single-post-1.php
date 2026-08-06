<?php
/**
 * Template Name: MML-Blog-Detail
 *
 */

get_header();

$img_url = get_the_post_thumbnail_url($post->ID, 'full');

$categories = get_categories([ 'hide_empty' => false ]);

$the_query = new WP_Query([
	'post_type' => 'post',
	'post_status' => 'publish',
	'order' => 'DESC',
    'orderby' => 'post_date',
	'paged' => 1,
	'post__not_in' => [ $post->ID ],
	'posts_per_page' => 3
]);

$blogs = $the_query->posts;

$page_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];

$hide_side = mtf_get_option('options', 'hide_side_recent_blog') === 'y' ? true : false;

?>

<div class="mml-bread-brumb">
    <div class="mml-row">
			<a href="/">Home<span>&gt;</span></a>
			<a href="/blog/">Blog<span>&gt;</span></a>
			<span><?php echo $post->post_title?></span>
    </div>
</div>

<div class="mml-row mml-blog-detail">
	<div class="blog-article">
		<div class="blog-detail-colwidth">
			<h1 class="blog-detail-title"><?php the_title(); ?></h1>
			<div class="blog-detail-info">
				<div class="blog-time">
					<i class="far fa-clock"></i>
					<span><?php echo date('d/m/Y', strtotime($post->post_date)); ?></span>
				</div>
				<div class="blog-shares">
					Share:
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($page_url) .'&src=sdkpreparse'; ?>" class="fb-xfbml-parse-ignore" target="_blank"><i class="fab fa-facebook-square"></i></a>
					<a href="https://twitter.com/share?url=<?php echo urlencode($page_url); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
					<a href="https://www.pinterest.com/pin/create/button?url=<?php echo urlencode($page_url); ?>" target="_blank"><i class="fab fa-pinterest-square"></i></a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($page_url); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
				</div>
			</div>
		</div>
		<div class="blog-detail-content blog-detail-colwidth">
			<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</div>
	<!-- 		<div class="blog-widget">
			<h2>Blog Classification</h2>
			<ul>
				<?php foreach ($categories as $index => $category) { ?>
					<li>
						<i class="fas fa-arrow-right"></i>
						<a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name ?></a>
					</li>
				<?php } ?>
			</ul>
		</div> -->

		<?php if (!$hide_side) { ?>
			<div class="blog-widget">
				<h2>Recent Blog</h2>
				<ul>
					<?php foreach ($blogs as $index => $blog) {
						if ($blog->ID === $post->ID) {
							continue;
						}
						$blog->link = get_permalink($blog->ID);
						$blog->tags = get_the_tags($blog->ID);
						$blog->tag = '';
						if ($blog->tags && count($blog->tags) > 0) {
							$blog->tag = $blog->tags[0]->name;
						}
					?>
						<li>
							<i class="fas fa-arrow-right"></i>
							<a href="<?php echo $blog->link; ?>"><?php echo $blog->post_title; ?></a>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
		<!-- Previous & Next  -->
<!--    --><?php //if (get_previous_post()) { ?>
<!--        <a class="prev-post" href="<?php //echo get_permalink(get_previous_post()->ID); ?>"><i class="fas fa-angle-left"></i>Previous Post</a>-->
<!--    --><?php //} ?>
<!--    --><?php //if (get_next_post()) { ?>
<!--        <a class="next-post" href="<?php //echo get_permalink(get_next_post()->ID); ?>">Next Post<i class="fas fa-angle-right"></i></a>-->
<!--    --><?php //} ?>
</div>


<div class="mml-row mml-blog-recent" style="display: none">
	<h2>Recent Blog</h2>
	<ul class="mml-cols-3">
		<?php foreach ($blogs as $index => $blog) {
			if ($blog->ID === $post->ID) {
				continue;
			}
			$blog->link = get_permalink($blog->ID);
			$blog->image_url = get_the_post_thumbnail_url($blog->ID, 'full');
			if (!$blog->image_url) {
				$blog->image_url = 'https://via.placeholder.com/580x400/a8afba/fff?text=Blog';
			}
			$blog->tags = get_the_tags($blog->ID);
			$blog->tag = '';
			if ($blog->tags && count($blog->tags) > 0) {
				$blog->tag = $blog->tags[0]->name;
			}
		?>
			<li class="blog-item">
				<a href="<?php echo $blog->link; ?>">
					<div class="mml-image">
						<img src="<?php echo $blog->image_url; ?>">
						<span class="blog-tag"><?php echo $blog->tag; ?></span>
					</div>
				</a>
				<div class="mml-text">
					<div class="blog-time">
						<i class="far fa-clock"></i>
						<span><?php echo date('d/m/Y', strtotime($blog->post_date)); ?></span>
					</div>
					<a href="<?php echo $blog->link; ?>" class="blog-title"><?php echo $blog->post_title; ?></a>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>



<?php get_footer();

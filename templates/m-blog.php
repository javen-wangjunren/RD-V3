<?php
/**
 * Template Name: MML-Blog
 *
 * @package Betheme
 * @author Muffin Group
 */

/*
	可选择的项：

	#模板 Layout：		[0, 1, 2, 3, 4, 5, 6, 7]
	#列数 Cols：			[1, 2, 3]
	#每页博客数 Count：	9 [default]

	以下项可设置 显示/隐藏

	#标题	Title
	#图片	Image
	#引用	Excerpt（目前只有 tpl-blog-2 的 readmore 需要填入 .blog-excerpt 内容尾部）
	#时间	Time（格式设置）
	#标签	Tag（内容为空时已自动隐藏）
	#更多	Readmore（文本设置）
 */

get_header();

$blog_layout = (int) mtf_get_blog_layout();
$blog_cols = (int) mtf_get_blog_column();
$page_size = (int) mtf_get_blog_page_size();
$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

$the_query = new WP_Query([
	'post_type' => 'post',
	'post_status' => 'publish',
	'paged' => $page,
	'order' => 'DESC',
    'orderby' => 'post_date',
	'posts_per_page' => $page_size
]);

$blogs = $the_query->posts;
$max_num_pages = $the_query->max_num_pages;

?>

<!-- 博客模板 0 -->
<!-- 以 tpl-blog-n 区别 -->
<div class="mml-row mml-blog tpl-blog-<?php echo $blog_layout; ?>">

	<!-- .mml-cols-n 列数控制 [1, 3] -->
	<ul class="mml-cols-<?php echo $blog_cols; ?>">

		<?php foreach($blogs as $index => $blog) {
			$blog->link = get_permalink($blog->ID);
			$blog->date = strtotime($blog->post_date);
			$blog->day = date('d', $blog->date);
			$blog->month = date('M', $blog->date);
			$blog->year = date('Y', $blog->date);
			$blog->image_url = get_the_post_thumbnail_url($blog->ID, 'full');
			$blog->tags = get_the_tags($blog->ID);
			$blog->tag = 'BLOG';
			if ($blog->tags && count($blog->tags) > 0) {
				$blog->tag = $blog->tags[0]->name;
			}

			// 按配置处理
			if ($blog_layout === 3) {
				$blog->month = date('m', $blog->date);
			} else if ($blog_layout === 4) {
				$blog->month = date('F', $blog->date);
			} else if ($blog_layout === 5) {
				$blog->tag = '';
			} else if ($blog_layout === 7) {
				$blog->month = date('m', $blog->date);
				$blog->tag = '';
			}

			// 容错处理
			if (!$blog->image_url) {
				$blog->image_url = 'https://via.placeholder.com/590x420/a8afba/fff?text=Blog';
			}
		?>

			<li class="blog-item">

				<?php if ($blog_layout === 0 || $blog_layout === 1 || $blog_layout === 2 || $blog_layout === 3 || $blog_layout === 5 || $blog_layout === 6 || $blog_layout === 7) { ?>
					<!-- 图片板块 -->
					<a href="<?php echo $blog->link; ?>">
						<div class="mml-image">

							<img src="<?php echo $blog->image_url; ?>">

							<!-- 标签 -->
							<span class="blog-tag"><?php echo $blog->tag; ?></span>

						</div>
					</a>
				<?php } ?>

				<div class="mml-text">

					<!-- 时间 -->
					<div class="blog-time">
						<!-- 需要判断 组装HTML -->
						<?php if ($blog_layout === 0) { ?>
							<span class="blog-date"><?php echo $blog->day; ?></span>
							<span class="blog-yearmonth"><?php echo $blog->month; ?>.<?php echo $blog->year; ?></span>
						<?php } else if ($blog_layout === 1) { ?>
							<span><?php echo $blog->month; ?> <?php echo $blog->day; ?>, <?php echo $blog->year; ?></span>
						<?php } else if ($blog_layout === 2 || $blog_layout === 6) { ?>
							<i class="far fa-clock"></i>
							<span><?php echo $blog->month; ?> <?php echo $blog->day; ?>, <?php echo $blog->year; ?></span>
						<?php } else if ($blog_layout === 3 || $blog_layout === 7) { ?>
							<i class="far fa-clock"></i>
							<span><?php echo $blog->day; ?>/<?php echo $blog->month; ?>/<?php echo $blog->year; ?></span>
						<?php } else if ($blog_layout === 4) { ?>
							<span><?php echo $blog->day; ?> <?php echo $blog->month; ?> <?php echo $blog->year; ?></span>
						<?php } else if ($blog_layout === 5) { ?>
							<span><?php echo $blog->month; ?> <?php echo $blog->day; ?>, <?php echo $blog->year; ?></span>
						<?php } ?>
					</div>

					<!-- 标题 -->
					<a href="<?php echo $blog->link; ?>" class="blog-title"><?php echo $blog->post_title; ?></a>

					<?php if ($blog_layout === 0 || $blog_layout === 1 || $blog_layout === 6) { ?>
						<!-- 描述 -->
						<span class="blog-excerpt"><?php echo $blog->post_excerpt; ?></span>

						<!-- Read More -->
						<a href="<?php echo $blog->link; ?>" class="blog-readmore">Learn More<i class="fas fa-caret-right"></i></a>
					<?php } else if ($blog_layout === 2) { ?>
						<span class="blog-excerpt">
							<?php echo $blog->post_excerpt; ?>
							<a href="<?php echo $blog->link; ?>" class="blog-readmore">Read More</a>
						</span>
					<?php } else if ($blog_layout === 4) { ?>
						<span class="blog-excerpt"><?php echo $blog->post_excerpt; ?></span>
						<a href="<?php echo $blog->link; ?>" class="blog-readmore">READ MORE<i class="fas fa-arrow-right"></i></a>
					<?php } else if ($blog_layout === 5) { ?>
						<span class="blog-excerpt"><?php echo $blog->post_excerpt; ?></span>
						<a href="<?php echo $blog->link; ?>" class="blog-readmore"><i class="far fa-file-alt"></i>Read More</a>
					<?php } else if ($blog_layout === 7) { ?>
						<span class="blog-excerpt"><?php echo $blog->post_excerpt; ?></span>
						<a href="<?php echo $blog->link; ?>" class="blog-readmore">Read More</a>
					<?php } ?>
				</div>

			</li>

		<?php } ?>
	</ul>

	<?php if($max_num_pages > 1){ ?>
	<!-- 分页容器 -->
	<div class="mml-pages"></div>
	<?php } ?>

</div>

<?php if($max_num_pages > 1){ ?>
<script src="/wp-content/themes/mml-theme/dist/js/mml-page.js"></script>
<script>
;(function($){
	$(function(){

		$('.mml-pages').mmlpage(<?php echo $page; ?>, <?php echo $max_num_pages; ?>, {
			prev: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			next: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
			href: '?page='
		});

	});
})(jQuery);
</script>
<?php } ?>
<?php get_footer();

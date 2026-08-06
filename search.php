<?php
get_header();
$kw = isset($_GET['s'])? $_GET['s']:'';
$kwType = isset($_GET['type'])? $_GET['type']:'';
$t = isset($_GET['t'])? $_GET['t']:'';
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>
<style>
	.px-24{
		padding-left: 24px;
		padding-right: 24px;
	}
	.pe-24{
		padding-right: 24px;
	}
	.mt-24{
		margin-top: 24px;
	}
	.mb-24{
		margin-bottom: 24px;
	}
	.mt-80{
		margin-top: 80px;
	}
	.mt-8{
		margin-top: 8px;
	}
	.d-block{
		display: block;
	}
	.object-fit-cover{
		object-fit: cover;
	}
	.max-width-100{
		max-width: 100%;
		overflow-x: hidden;
	}
	.lh-36, .lh-36 h2{
		line-height: 36px!important;
	}
	.filters-block{
		border: 1px solid #D9D9D9;
		padding: 24px;
		border-radius: 12px;
	}
	.filters-block input{
		zoom: 1.75;
		margin-right: 4px;
	}
	.fs-24{
		font-size: 24px;
	}
	.page-numbers{
		display: flex;
		background: #e7e7e7;
		border-radius: 4px;
	}
	.page-numbers li a, .page-numbers li span{
		padding: 8px 12px;
    	font-size: 16px;
		display: block;
	}
	.page-numbers li .current{
		color: #EA543F;
	}
	.pagination{
		justify-content: start!important;
	}
	.form-button{
		width: 54px;
		height: 48px;
		padding: 8px;
		background: #EA543F;
		border: 0px;
	}
	.form-search{
		border: 2px solid #E2E8F0;
		border-radius: 12px;
		overflow: hidden;
		display: flex;
	}
	.input-search{
		border: 0px;
		padding: 12px;
	}
	.text-center{
		text-align: center;
	}
	.orange, orange{
		color: #EA543F;
	}
	.related-search-items a{
		background: #F7FAFC;
		border: 1px solid #E2E8F0;	
		padding: 8px 16px;
		display: inline-block;
		margin-bottom: 12px;
		margin-right: 12px;
		border-radius: 50px;
	}
	.spl-btn-contact-search{
		background: #EA543F!important;
		padding: 24px 48px!important;
		font-size: 18px;
		font-weight: 600;
		color: white!important;
	}
	.d-flex{
		display: flex;
	}
	.justify-content-center{
		justify-content: center;
	}
</style>
<?php
	$args = [
		's' => $kw,
		'posts_per_page' => 10,
		'paged' => $paged
	];

	if($kwType){
		$args = [
			's' => $kw,
			'post_type' => $kwType,
			'posts_per_page' => 10, 
			'paged' => $paged
		];
	}

	$meta_query = [];
	if ( $kwType == 'materials' ) {
		$meta_query[] = [
			'key'     => 'is_material_page',
			'value'   => '1',
			'compare' => '='
		];
		$args = [
			's'              => $kw,
			'posts_per_page' => 10,
			'paged'          => $paged,
			'post_type'      => 'page',
			'meta_query'     => $meta_query
		];
	}
	if ( $kwType == 'ebooks' ) {
		$meta_query[] = [
			'key'     => 'is_ebooks_page',
			'value'   => '1',
			'compare' => '='
		];
		$args = [
			's'              => $kw,
			'posts_per_page' => 10,
			'paged'          => $paged,
			'post_type'      => 'page',
			'meta_query'     => $meta_query
		];
	}
	
	$query = new WP_Query( $args );
?>
<section class="elementor-section elementor-top-section elementor-element mt-80 max-width-100">
	<div class="elementor-container elementor-column-gap-default align-start" style="max-width: 1280px;">
		<form action="/" class="form-search w-100 d-flex">
			<input type="text" id="s" name="s" class="input-search w-100" value="<?= $kw;?>" placeholder="Search CNC machining, sheet metal...">
			<button type="submit" value="Submit" class="form-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="fill: white;"><path d="M432 272C432 183.6 360.4 112 272 112C183.6 112 112 183.6 112 272C112 360.4 183.6 432 272 432C360.4 432 432 360.4 432 272zM401.1 435.1C365.7 463.2 320.8 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272C480 320.8 463.2 365.7 435.1 401.1L569 535C578.4 544.4 578.4 559.6 569 568.9C559.6 578.2 544.4 578.3 535.1 568.9L401.1 435.1z"/></svg></button>
		</form>
	</div>
	<?php if($query->found_posts){ ?>
		<div class="elementor-container elementor-column-gap-default align-start mt-80" style="max-width: 1280px;">
			<div class="">
				<h1>
					Search results for: “<?= $kw;?>”
				</h1>
				<div class="mt-24">
					Found <?= $query->found_posts ?> results
				</div>
			</div>
		</div>
		<div class="elementor-container elementor-column-gap-default align-start mt-80" style="max-width: 1280px;">
			<div class="elementor-column elementor-col-25 elementor-top-column elementor-element">
				<div class="w-100 pe-24">
					<div class="filters-block">
						<div class="fs-24">
							Filters
						</div>
<!-- 						<div class="mt-24 d-block">
							<input type="checkbox" name="vehicle1" value="All" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>" class="redirect-checkbox" <?php if(!$kwType){ echo 'checked'; }?>>
							<label for="vehicle1"> All Results</label><br>
						</div> -->
						<div class="mt-24">
							<input type="checkbox" name="vehicle2" value="Blog" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=post" class="redirect-checkbox" <?php if($kwType == 'post'){ echo 'checked'; }?>>
							<label for="vehicle2"> Blog</label><br>
						</div>
						<div class="mt-8">
							<input type="checkbox" name="vehicle3" value="Case-Study" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=cases_studies" class="redirect-checkbox" <?php if($kwType == 'cases_studies'){ echo 'checked'; }?>>
							<label for="vehicle3"> Case Study</label><br>
						</div>
						<div class="mt-8">
							<input type="checkbox" name="vehicle6" value="Materials" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=materials" class="redirect-checkbox" <?php if($kwType == 'materials'){ echo 'checked'; }?>>
							<label for="vehicle6"> Materials</label><br>
						</div>
						<div class="mt-8">
							<input type="checkbox" name="vehicle7" value="surface-finish" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=surface-finish" class="redirect-checkbox" <?php if($kwType == 'surface-finish'){ echo 'checked'; }?>>
							<label for="vehicle7"> Finishes</label><br>
						</div>
						<div class="mt-8">
							<input type="checkbox" name="vehicle8" value="Ebooks" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=ebooks" class="redirect-checkbox" <?php if($kwType == 'ebooks'){ echo 'checked'; }?>>
							<label for="vehicle8"> Ebooks</label><br>
						</div>
						<div class="mt-8">
							<input type="checkbox" name="vehicle4" value="News" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=news" class="redirect-checkbox" <?php if($kwType == 'news'){ echo 'checked'; }?>>
							<label for="vehicle4"> News</label><br>
						</div>
						<div class="mt-8">
							<input type="checkbox" name="vehicle5" value="Help-Center" data-link="https://www.rapiddirect.com/?s=<?= $kw; ?>&type=answer" class="redirect-checkbox" <?php if($kwType == 'answer'){ echo 'checked'; }?>>
							<label for="vehicle5"> Help Center</label><br>
						</div>
					</div>
				</div>
			</div>
			<div class="elementor-column elementor-col-75 elementor-top-column elementor-element d-block" id="results">
				<?php 
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
				?>
				<a href="<?php the_permalink(); ?>" class="elementor-container elementor-column-gap-default align-start mb-24">
					<div class="elementor-column elementor-col-40 elementor-top-column elementor-element mb-24">
						<?php $featuredImg = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
							if(!$featuredImg){
								$featuredImg = 'https://www.rapiddirect.com/wp-content/uploads/2025/09/Image_2025-09-15_091624_037-scaled.jpg';
							}
						?>
						<img class="w-100 object-fit-cover" height="250px"
							 src="<?php echo esc_url( $featuredImg ); ?>"
							 alt="<?php the_title_attribute(); ?> featured image">
					</div>
					<div class="elementor-column elementor-col-60 elementor-top-column elementor-element px-24 d-block">
						<div class="lh-36">
							<?php the_title('<h2>', '</h2>'); ?>
						</div>
						<div class="mt-24">
							<?php $yoast_meta = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
							if ($yoast_meta) { //check if the variable(with meta value) isn't empty
								echo $yoast_meta;
							} else{
								the_excerpt();
							}?>
							<?php //the_excerpt(); ?>
						</div>
					</div>
				</a>
				<?php
					}
					// ✅ Reset global $post back to original
					wp_reset_postdata();
				} else {
					echo 'No results found.';
				}
				?>
				<div class="mt-40">
					<?php
					$big = 999999999; // need an unlikely integer
					$pagination = paginate_links( [
						'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'    => '?paged=%#%',
						'current'   => max( 1, $paged ),
						'total'     => $query->max_num_pages,
						'prev_text' => '« Prev',
						'next_text' => 'Next »',
						'type'      => 'list',
						'add_args'  => [
							's'    => $kw,
							'type' => isset($_GET['type']) ? sanitize_text_field($_GET['type']) : ''
						]
					] );

					if ( $pagination ) {
						echo '<nav class="pagination">' . $pagination . '</nav>';
					}
					?>
				</div>
			</div>
		</div>
	<?php }else{ ?>
	<div class="elementor-container elementor-column-gap-default align-start mt-80" style="max-width: 1280px;">
		<div class="w-100 text-center">
			<div class="">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="72px"><!--!Font Awesome Pro v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M464 272C464 166 378 80 272 80C166 80 80 166 80 272C80 378 166 464 272 464C378 464 464 378 464 272zM413.3 424.6C376.2 459 326.6 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272C480 326.6 459 376.2 424.6 413.3L573.6 562.3C576.7 565.4 576.7 570.5 573.6 573.6C570.5 576.7 565.4 576.7 562.3 573.6L413.3 424.6z"/></svg>
			</div>
			<div class="mt-40">
				<h1>
					No results found for “<span class="orange"><?= $kw;?></span>”
				</h1>
			</div>
			<div class="mt-24">
				Try checking the spelling or searching for related terms.
			</div>
			<div class="mt-40">
				<div class="related-search-items">
					<a href="https://www.rapiddirect.com/?s=cnc+machining">CNC machining</a>
					<a href="https://www.rapiddirect.com/?s=Sheet+metal">Sheet metal</a>
					<a href="https://www.rapiddirect.com/?s=Injection+molding">Injection molding</a>
					<a href="https://www.rapiddirect.com/?s=3D+printing">3D printing</a>
					<a href="https://www.rapiddirect.com/?s=Rapid+prototyping">Rapid prototyping</a>
					<a href="https://www.rapiddirect.com/?s=Production">Production</a>
				</div>
			</div>
			<div class="mt-80">
				<div class="">
					<strong>Can't find what you're looking for?</strong>
				</div>
				<div class="mt-8">
					Our manufacturing experts are here to help you find the <br>perfect solution for your project requirements.
				</div>
				<div class="mt-24">
					<div class="elementor-widget-container">
						<div class="elementor-button-wrapper">
							<a class="elementor-button elementor-button-link elementor-size-sm spl-btn-contact-search" href="https://www.rapiddirect.com/contact/">
								<span class="elementor-button-content-wrapper">
									<span class="elementor-button-text">Contact Us</span>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="mt-24 d-flex justify-content-center">
					<div class="d-flex pe-24 mb-24">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24px"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M176.8 74.9C204.1 65.8 233.8 78.8 245.7 104.9L285.4 192.2C296 215.6 289.4 243.2 269.4 259.3L245.2 278.6C270.7 328.6 310.7 370 359.6 397.4L380.8 370.8C396.9 350.7 424.5 344.1 447.9 354.8L535.2 394.5C561.4 406.4 574.3 436.1 565.2 463.4C544.5 525.7 481.5 579.6 404.3 566C230.6 535.4 104.7 409.5 74.1 235.8C60.5 158.6 114.5 95.7 176.7 74.9zM202 124.8C200.3 121 196 119.1 192 120.4C146.8 135.5 112.9 179 121.5 227.4C148.6 381.2 258.9 491.6 412.7 518.7C461.1 527.2 504.6 493.4 519.7 448.2C521 444.2 519.1 439.9 515.3 438.2L428 398.4C424.6 396.9 420.6 397.8 418.3 400.7L384.8 442.6C377.8 451.3 365.8 454.1 355.8 449.3C283.3 414.9 225.3 355 193.4 281.1C189.1 271.2 192 259.6 200.4 252.9L239.3 221.8C242.2 219.5 243.2 215.5 241.6 212.1L201.9 124.7z"/></svg>
						</span> 
						<span>+86 0755-85276703</span>
					</div>
					<div class="d-flex pe-24 mb-24">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24px"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M125.4 128C91.5 128 64 155.5 64 189.4C64 190.3 64 191.1 64.1 192L64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192L575.9 192C575.9 191.1 576 190.3 576 189.4C576 155.5 548.5 128 514.6 128L125.4 128zM528 256.3L528 448C528 456.8 520.8 464 512 464L128 464C119.2 464 112 456.8 112 448L112 256.3L266.8 373.7C298.2 397.6 341.7 397.6 373.2 373.7L528 256.3zM112 189.4C112 182 118 176 125.4 176L514.6 176C522 176 528 182 528 189.4C528 193.6 526 197.6 522.7 200.1L344.2 335.5C329.9 346.3 310.1 346.3 295.8 335.5L117.3 200.1C114 197.6 112 193.6 112 189.4z"/></svg>
						</span> 
						<span>info@rapiddirect.com</span>
					</div>
					<div class="d-flex pe-24 mb-24">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24px"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M528 320C528 434.9 434.9 528 320 528C205.1 528 112 434.9 112 320C112 205.1 205.1 112 320 112C434.9 112 528 205.1 528 320zM64 320C64 461.4 178.6 576 320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/></svg>
						</span> 
						<span>24/7 Support Available</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<?php } ?>
</section>

<?php
	get_footer();
?>
<script>
jQuery('.redirect-checkbox').on('change', function() {
    if (jQuery(this).is(':checked')) {
        window.location.href = jQuery(this).data('link');
    }
});
// document.addEventListener("DOMContentLoaded", function() {
//     if (document.querySelector('.pagination')) {
//         // Auto-scroll to results on page load if pagination exists
//         document.querySelector('.pagination').scrollIntoView({behavior: "smooth"});
//     }
// });
</script>
<script>
jQuery(document).ready(function($) {
    // intercept clicks on pagination links
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        
        var link = $(this).attr('href'); // next page URL
        
        // Load new content into #results
        $('#results').load(link + ' #results > *', function() {
            // optional smooth scroll after reload
            document.getElementById('results').scrollIntoView({behavior: "smooth"});
        });
    });
});
</script>
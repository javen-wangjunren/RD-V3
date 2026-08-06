<?php
// =============================================================================
// TEMPLATE NAME: Help Center
// -----------------------------------------------------------------------------
// =============================================================================
?>
<?php get_header();?>
<div class="help-center">
	<div>
		<?php include_once "partials/help-center/_search-header.php" ?>
	</div>
	<?php if(isset($_GET['search'])) { ?>
		<div class="mt-50" id="scroll-here">
			<?php include_once "partials/help-center/_search.php" ?>
		</div>
		<section class="elementor-section elementor-section-boxed px-2 mt-40">
			<div class="max-width-1k paginations fs-20 fw-700 text-end">
				
			</div>
		</section>
	<?php }else{ ?>
		<div class="mt-150">
			<?php include_once "partials/help-center/_main-topics.php" ?>
		</div>
		<div class="mt-150 bg-F8F9FA">
			<div class="py-50">
				<div class="mt-50"></div>
				<?php include_once "partials/help-center/_faqs.php" ?>
				<div class="mt-50"></div>
			</div>
		</div>
		<div class="mt-150">
			<?php include_once "partials/help-center/_help.php" ?>
		</div>
	<?php } ?>
</div>
<?php get_footer();?>
<script>
	var current_page = 0;
	var pagination = 0
	jQuery( document ).on("ready", function() {
		questions = jQuery('.single-ques');
		if(questions.length > 10){
			for (let i = 10; i < questions.length; i++) {
		  		jQuery(questions[i]).hide();
			}
// 			pagination = Math.ceil(questions.length/10);
// 			for (let i = 0; i < pagination; i++) {
// 				if(i==0){addcls = 'activee';}else{addcls = '';}
// 		  		jQuery('.paginations').append('<span class="p-10 pagination-number cursor-pointer '+ addcls +'" onclick="paginate( this, ' + i + ')" id="page-'+(i)+'">' + (i+1) + '</span>');
// 			}
// 			mainIcon = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect x="0.5" y="0.5" width="19" height="19" fill="white" stroke="black"/> <path d="M14 10L8 15.1962L8 4.80385L14 10Z" fill="#252525"/> </svg>';
// 			hoverIcon = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect x="0.5" y="0.5" width="19" height="19" fill="white" stroke="#EA543F"/> <path d="M14 10L8 15.1962L8 4.80385L14 10Z" fill="#EA543F"/> </svg>';
// 			appendIcons = '<span class="pointer-hover-pagination cursor-pointer p-10" width="20px" onclick="paginate( this, -1)"><span class="normal-image">'+mainIcon+'</span><span class="hover-image">'+hoverIcon+'</span></span>';
// 			jQuery('.paginations').append(appendIcons);
		}
	})
// 	function paginate(event, page){
// 		console.log(current_page);
// 		if(page == -1){
// 			current_page = current_page + 1
// 		}else{
// 			current_page = page;
// 		}
// 		console.log(current_page);
// 		jQuery('.pagination-number').removeClass('activee');
// 		jQuery('#page-'+current_page).addClass('activee');
// 		questions = jQuery('.single-ques');
// 		jQuery(questions).hide();
// 		loopEnd = (current_page+1)*10
// 		for (let i = current_page*10; i < loopEnd; i++) {
// 			jQuery(questions[i]).show();
// 		}
// 		jQuery('html, body').animate({
// 			scrollTop: jQuery("#scroll-here").offset().top
// 		}, 200);
// // 		console.log(current_page, pagination-1);
// 		if(pagination-1 == current_page){
// 			jQuery('.pointer-hover-pagination').hide();
// 			return true;
// 		}
// 		jQuery('.pointer-hover-pagination').show();
// 	}
// 	jQuery('.pagination .mml-page').click(function(){
// 		console.log('whats that')
		
// 	})
	function generatePagination(current, total){
		jQuery('.pagination').mmlpage(current, total, {
			prev: '<i class="fas fa-caret-left"></i>',
			next: '<i class="fas fa-caret-right"></i>',
			pageClass:'mml-page',
			activeClass:'active',
			// href: '?page='
			click:function () {
				questions = jQuery('.single-ques');
				page = jQuery(this).attr("data-page");
				jQuery(questions).hide();
				loopEnd = page*10
				for (let i = (page-1)*10; i < loopEnd; i++) {
					jQuery(questions[i]).show();
				}
				jQuery('html, body').animate({
					scrollTop: jQuery("#scroll-here").offset().top
				}, 200);
				generatePagination(page, Math.ceil(questions.length/10));
			}
		});
	}
	if(jQuery('.single-ques').length > 10){
		generatePagination(1, Math.ceil(jQuery('.single-ques').length/10));
	}
</script>
<style>
	.help-center{
		font-family: 'Poppins';
	}
	.mt-150{
		margin-top: 150px;
	}
	.pe-60{
		padding-right: 60px;
	}
	.pe-100{
		padding-right: 100px;
	}
	.mt-50{
		margin-top: 50px;
	}
	.orange{
		color: #EA543F;
	}
	.px-50{
		padding-left: 50px;
		padding-right: 50px;
	}
	.py-50{
		padding-top: 50px;
		padding-bottom: 50px;
	}
	.border-1px{
		border: 1px solid #D0D0D0;
	}
	.help-center-body p{
		margin-bottom: 24px;
	}
	.help-center-body ul{
		list-style: disc;
		padding-left: 15px;
	}
	.help-center-body li{
		margin-bottom: 15px;
	}
	.align-start{
		align-items: flex-start!important;
	}
	.justify-start{
		justify-content: flex-start!important;
	}
	.justify-center{
		justify-content: center!important;
	}
	.justify-end{
		justify-content: end!important;
	}
	.side-ques{
		padding: 8px 16px;
		font-weight: 600;
	}
	.side-ques:hover, .side-ques.activee{
		color: #EA543F;
		background: rgba(234, 84, 63, 0.06);
	}
	.ps-6{
		padding-left: 6px;
	}
	.help-center-header{
		background-size: cover!important;
		background-repeat: no-repeat!important;
	}
	.bg-black-trans{
		background: rgba(0, 0, 0, 0.55);
		padding-top: 42px;
		padding-bottom: 42px;
	}
	.max-width-1k{
		max-width: 1000px;
		margin: auto;
	}
	.w-100{
		width: 100%;
	}
	.search-bar{
		margin-top: 40px;
	}
	.input-with-icon {
		position: relative;
		display: flex;
	}

	.input-icon {
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		left: 25px;
		color: #252525!important;
		font-size: 30px;
	}
	.input-field {
		padding-left: 80px!important;
		padding-top: 10px!important;
		padding-bottom: 10px!important;
		font-size: 24px;
		line-height: 36px;
	}
	.input-field::placeholder {
		color: #252525!important;
		opacity: 1;
	}
	.px-2{
		padding: 0% 2% 0% 2%;
	}
	.px-10{
		padding: 0% 10%;
	}
	.pt-36{
		padding-top: 36px;
	}
	.mt-20{
		margin-top: 20px;
	}
	.mt-24{
		margin-top: 24px;
	}
	.mb-24{
		margin-bottom: 24px;
	}
	.mt-48{
		margin-top: 48px;
	}
	.seems-h1{
		font-size: 46px;
		font-family: 'Bai Jamjuree';
		line-height: 58px;
	}
	.fs-20{
		font-size: 20px;
		line-height: 30px;
	}
	.fs-18{
		font-size: 18px;
		line-height: 26px;
	}
	.fs-16{
		font-size: 16px;
		line-height: 20px;
	}
	.fs-28{
		font-size: 28px!important;
		line-height: 36px!important;
	}
	.fs-36{
		font-size: 36px!important;
		line-height: 44px!important;
	}
	.color-252525{
		color: #252525;
	}
	.fw-500{
		font-weight: 500;
	}
	.fw-600{
		font-weight: 600;
	}
	.fw-700{
		font-weight: 700;
	}
	.font-bai{
		font-family: "Bai Jamjuree", Sans-serif;
	}
	.ms-30{
		margin-left: 30px;
	}
	
	.m-30{
		margin: 30px 30px;
	}
	.button-shortcode.white-button{
		border: 1px solid #EA543F;
		background: white!important;
		color: #EA543F!important;
	}
	.button-shortcode.white-button:hover{
		background: #EA543F!important;
		color: white!important;
	}
	.border-1px{
		border: 1px solid;
	}
	.border-color-d0{
		border-color: #D0D0D0;
	}

	.reaction-icon{
		width: 40px;
		height: 40px;
		text-align: center;
		line-height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		background: #E2E7EA;
		border: 4px solid #FFFFFF;
		filter: drop-shadow(0px 0px 8px rgba(0, 0, 0, 0.1));
		transition-duration: 0.4s;
	}
	.reaction-icon.ajax-likes{
		cursor: pointer;
	}
	.reaction-icon:hover, .reaction-icon.activee{
		background: #FEE8B9;
		width: 46px;
		height: 46px;
	}
	.reaction-icon:hover svg path, .reaction-icon.activee svg path{
		stroke: #D69729!important;
	}
	.max-width-300{
		max-width: 300px;
	}
	.mx-auto{
		margin: auto;
	}
	.fs-24{
		font-size: 24px!important;
		line-height: 32px!important;
	}
	.mx-30{
		margin-left: 30px;
		margin-right: 30px;
	}
	.color-252525{
		color: #252525;
	}
	.color-878787{
		color: #878787;
	}
	.fw-500{
		font-weight: 500;
	}
	.hr-help{
		height:1px;
		background: #D0D0D0;
		margin-top: 15px;
	}
	.help-search-box{
		background: #FFFFFF;
		box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.12);
		padding: 20px 40px;
	}
	.help-search-box .help-exc{
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		margin-top: 15px;
	}
	.help-search-box:hover h3{
		text-decoration-line: underline;
	}
	.help-search-box:hover .hover-orange{
		color: #EA543F;
	}
	.hover-state-card:hover{
		background: rgba(234, 84, 63, 0.06);
	}
	.hover-state-card:hover *{
		color: #EA543F;
		fill: #EA543F!important;
	}
	.hover-orange:hover{
		color: #EA543F;
		fill: #EA543F!important;
	}
	.hover-orange:hover *{
		color: #EA543F;
		fill: #EA543F!important;
	}
	.hover-state-card .hover-image{
		display: none;
	}
	.hover-state-card:hover .normal-image{
		display: none;
	}
	.hover-state-card:hover .hover-image{
		display: block;
	}
	.flex-wrap{
		flex-wrap: wrap;
	}
	.d-flex-all{
		display: flex;	
	}
	.bg-F8F9FA{
		background: #F8F9FA;
	}
	.align-items-center{
		align-items: center;
	}
	.justify-content-between{
		justify-content: space-between;
	}
	.answer-que{
		padding: 6px 12px;
		margin-left: 10px;
	}
	.visible-hover{
		visibility: hidden;
	}
	.answer-que:hover{
		background: #F8F7F6;
		color: #EA543F;
	}
	.answer-que:hover .visible-hover{
		visibility: visible;
	}
	.ps-15{
		padding-left: 15px;
	}
	.p-10{
		padding: 10px;
	}
	.h-50px{
		height: 50px;
	}
	.cursor-pointer{
		cursor: pointer;
	}
	.accordion {
		cursor: pointer;
		padding: 14px 30px;
		transition: 0.4s;
		box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
		background-color: #fff;
	}
	.accordion:after {
		content: '\f107';
		float: right;
		margin-left: 5px;
		font-family: 'Font Awesome 5 Free';
	}
	.mt-40{
		margin-top: 40px;
	}
	.active:after {
		content: "\f106";
	}
	.pagination-number:hover, .pagination-number.activee{
		color: #EA543F;
    	background: rgba(234, 84, 63, 0.06);
	}
	.panel {
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}
	.p-20-30{
		padding: 20px 30px;
	}
	.text-end{
		text-align: right;
	}
	.fs-46-imp{
		font-size: 46px!important;
	}
	.max-width-490{
		max-width: 490px;
	}
	.pb-0{
		padding-bottom: 0px;
	}
	.pointer-hover-pagination{
		width: 20px;
	}
	.pointer-hover-pagination .hover-image{
		display:none;
	}
	.pointer-hover-pagination:hover .normal-image{
		display:none;
	}
	.pointer-hover-pagination:hover .hover-image{
		display:inline-block;
	}
	.pagination .active:after{
		display: none;
	}
	@media only screen and (max-width: 600px) {
		.zoom-65{
			zoom: 0.65;
		}
	}
</style>
<div class="help-center-header" style="background: url('/wp-content/uploads/2023/06/img-scaled.jpg')">
	<div class="bg-black-trans">
		<div class="max-width-1k text-center">
			<?php if(get_post_type() == 'page'){ ?>
				<h1 class="color-white fs-46-imp pb-0">
					How Can We Help?
				</h1>
			<?php }else{ ?>
				<h2 class="color-white fs-46-imp pb-0">
					How Can We Help?
				</h2>
			<?php } ?>
			<div class="search-bar contact-form">
				<form action="/help-center/" id="search-form" method="get">
					<div class="input-with-icon">
						<div class="w-100">
							<i class="input-icon">
								<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"/></svg>
							</i>
							<input type="text" class="input-field" name="search" placeholder="Search help articles" value="<?= $_GET['search'];?>">
						</div>
						<a class="elementor-button-link elementor-button elementor-size-lg button-shortcode fw-700" role="button"  type="submit" href="javascript:{}" onclick="document.getElementById('search-form').submit();">
							Search	
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
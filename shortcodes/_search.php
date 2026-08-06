<?php
	function search_box_rd() { 
		ob_start();
		?>
<style>
	#search-box-main-id{
		display: none;
		position: absolute;
		top: 90px;
		width: 100%;
		height: calc(100vh - 90px);
		z-index: 99;
		background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 40%, rgba(0, 0, 0, 0.5) 40%, rgba(0, 0, 0, 0.5) 100%);
	}
	.form-search-header{
		max-width: 1000px;
		margin: auto;
		border: 2px solid #E2E8F0;
		border-radius: 12px;
		background: #ffffff;
		position: relative;
	}
	.header-form-form{
		padding: 18px;
	}
	.input-search-head{
		border: none;
		padding-left: 20px;
	}
	.related-search-links{
		border-top: 2px solid #E2E8F0;
		padding: 24px;
	}
	.d-flex {
		display: flex;
	}
	.mt-24{
		margin-top: 24px;
	}
	.related-search-links a{
		display: block;
		margin-bottom: 8px;
	}
	.related-search-links a span:first-child{
		fill: #EA543F;
		margin-right: 8px;
	}
	.close-search-error{
		cursor: pointer;
		width: 28px;
		padding: 2px;
		position: absolute;
		right: -40px;
		top: 5px;
	}
</style>
		<div class="mt-40" id="search-box-id-123">
			<div class="form-search-header">
				<div class="close-search-error">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="24px;"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M135.5 169L118.5 152L152.4 118.1L169.4 135.1L320.4 286.1L471.4 135.1L488.4 118.1L522.3 152L505.3 169L354.3 320L505.3 471L522.3 488L488.4 521.9L471.4 504.9L320.4 353.9L169.4 504.9L152.4 521.9L118.5 488L135.5 471L286.5 320L135.5 169z"/></svg>
				</div>
				<form action="/" class="header-form-form w-100 d-flex">
					<svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 640 640"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M448 272C448 174.8 369.2 96 272 96C174.8 96 96 174.8 96 272C96 369.2 174.8 448 272 448C369.2 448 448 369.2 448 272zM407.3 430C371 461.2 323.7 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272C480 323.7 461.2 371 430 407.3L571.3 548.7C577.5 554.9 577.5 565.1 571.3 571.3C565.1 577.5 554.9 577.5 548.7 571.3L407.3 430z"/></svg>
					<input type="text" id="s" name="s" class="input-search-head w-100" value="" placeholder="Search CNC machining, sheet metal...">
				</form>
				<div class="related-search-links">
					<div>
						Quick Links
					</div>
					<a href="https://www.rapiddirect.com/services/cnc-machining/" class="mt-24">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							CNC Machining
						</span>
					</a>
					<a href="https://www.rapiddirect.com/services/injection-molding/">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							Injection Molding
						</span>
					</a>
					<a href="https://www.rapiddirect.com/services/sheet-metal-fabrication/">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							Sheet Metal Fabrication
						</span>
					</a>
					<a href="https://www.rapiddirect.com/services/3d-printing/">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							3D Printing
						</span>
					</a>
					<a href="https://www.rapiddirect.com/materials/">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							Materials
						</span>
					</a>
					<a href="https://www.rapiddirect.com/surface-finishes/">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							Surface Finishes
						</span>
					</a>
					<a href="https://www.rapiddirect.com/npi-solutions/">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="12px"><!--!Font Awesome Pro v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M569.4 337L586.4 320L569.4 303L401.4 135L384.4 118L350.5 151.9L367.5 168.9L494.5 295.9L64.4 295.9L64.4 343.9L494.5 343.9L367.5 470.9L350.5 487.9L384.4 521.8L401.4 504.8L569.4 336.8z"/></svg>
						</span>
						<span class="ps-8">
							NPI Solutions
						</span>
					</a>
				</div>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('search-box', 'search_box_rd');
?>
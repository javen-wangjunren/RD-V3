<?php ?><!DOCTYPE html>
<html lang="en">
<head>
	<script defer src="https://pro.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-8nTbev/iV1sg3ESYOAkRPRDMDa5s0sknqroAe9z4DiM+WDr1i/VKi5xLWsn87Car" defer crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<style>
		.hello-there-class-test{
			text-align: center;
		}
	</style>
</head>

<body <?php body_class(); ?> data-test="test-all" data-lol="lot-test">
<?php wp_body_open(); ?>
<div class="global-wrap">
	<header class="rd-header" data-rd-header>
		<?php mml_theme_fn_render_site_header(); ?>
	</header>

	<div id="J_slideMenu" class="slide-menu">
		<div class="slide-close" id="J_slideClose">
			<i class="fas fa-times"></i>
		</div>
		<div class="menu-wrapper">
		</div>
	</div>
	<div id="J_slideMask" class="slide-mask"></div>
</div>

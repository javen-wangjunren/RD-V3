<?php get_header();?>
<main id="main">
<div class="help-center">
	<div>
		<?php include_once "partials/help-center/_search-header.php" ?>
	</div>
	<div class="mt-50 fs-20">
		<?php include_once "partials/help-center/_breadcrumbs.php" ?>
	</div>
	<div class="mt-50">
		<?php include_once "partials/help-center/_topic-content.php" ?>
	</div>
	<div class="mt-150">
		<?php include_once "partials/help-center/_help.php" ?>
	</div>
</div>
</main>
<?php get_footer();?>
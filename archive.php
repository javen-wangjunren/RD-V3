<?php

get_header();

$term = get_queried_object();

$shortcode = get_term_meta($term->term_id, 'term_shortcode', true);
?>

<main id="main">
<?php
if ($shortcode) {
	echo do_shortcode($shortcode);
}
?>
</main>

<?php
get_footer();

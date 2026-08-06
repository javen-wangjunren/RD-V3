<?php

get_header();

$term = get_queried_object();

$shortcode = get_term_meta($term->term_id, 'term_shortcode', true);

if ($shortcode) {
	echo do_shortcode($shortcode);
}

get_footer();

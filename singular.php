<?php

get_header();
?>

<main id="main">
<?php echo apply_filters('the_content', $post->post_content); ?>
</main>
	
<?php
get_footer();

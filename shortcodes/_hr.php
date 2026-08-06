<?php
	function display_horizontal_hr($atts, $content = null) { 
		$a = shortcode_atts( array(
			'width' => '48',
		), $atts );
		ob_start();
		?>
		<span style="height:4px;width:<?php echo esc_attr($a['width']); ?>px;display: inline-block;background:#EA543F;"></span>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('hr', 'display_horizontal_hr');

	function get_date_wp(){
		return get_the_date();
	}

	add_shortcode('date-rd', 'get_date_wp');

	function get_mod_date_wp(){
		$dateMod = '<strong>Last Updated Date:</strong> '.get_the_modified_date();
		if(get_the_date() != get_the_modified_date()){
			return $dateMod;
		}
		return;
	}

	add_shortcode('modified-date-rd', 'get_mod_date_wp');
?>

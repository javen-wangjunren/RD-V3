<?php 
/**
 * RapidDirect Spin Wheel - Update ACF prize counts (option page fields)
 */
add_action('rest_api_init', function() {
	register_rest_route('rapiddirect/v1', '/update-prize/', [
		'methods'  => 'POST',
		'callback' => 'rapiddirect_update_prize_count',
		'permission_callback' => '__return_true', // You can restrict later with nonce if needed
	]);
	register_rest_route('rapiddirect/v1', '/get-email-hash/', [
		'methods'  => 'POST',
		'callback' => 'rapiddirect_get_email_hash',
		'permission_callback' => '__return_true', // You can restrict later with nonce if needed
	]);
});

function rapiddirect_get_email_hash(WP_REST_Request $request) {
	$email = sanitize_text_field($request->get_param('email'));
	if (!isset($email)) {
		return new WP_REST_Response([
			'status'  => 'ignored',
			'message' => 'No email available'
		], 200);
	}
	$hash = hash("sha256", $email);
	return new WP_REST_Response([
		'status'    => 'success',
		'field'     => $hash,
		'message'   => 'Hashed successfully.'
	], 200);
}

function rapiddirect_update_prize_count(WP_REST_Request $request) {
	$prize_id = sanitize_text_field($request->get_param('prize'));

	// Map your JS prize IDs to ACF field names on the options page
	$map = [
		'HalloweenMQ109W8R'          => '10_percent_prize',
		'HalloweenMQ158Y37'          => '15_percent_prize',
		'HalloweenMQ200Shipping7Y2E' => 'free_shipping_up_to_200',
		'HalloweenRD20' => '20_percent_prize_upto_500',
	];

	// If it's not a limited prize, ignore the update
	if (!isset($map[$prize_id])) {
		return new WP_REST_Response([
			'status'  => 'ignored',
			'message' => 'This prize does not have any counter.'
		], 200);
	}

	$field_name = $map[$prize_id];
	$post_id = 'options'; // ACF Option page

	// Fetch current count
	$current = (int) get_field($field_name, $post_id);
	if ($current <= 0) {
		update_field($field_name, 0, $post_id);
		return new WP_REST_Response([
			'status'    => 'exhausted',
			'field'     => $field_name,
			'remaining' => 0,
			'message'   => 'Prize stock already exhausted.'
		], 200);
	}

	// Decrease count by 1
	$new_count = max(0, $current - 1);
	update_field($field_name, $new_count, $post_id);

	// Return success response
	return new WP_REST_Response([
		'status'    => 'success',
		'field'     => $field_name,
		'remaining' => $new_count,
		'message'   => 'Prize updated successfully.'
	], 200);
}

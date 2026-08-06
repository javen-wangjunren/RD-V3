<?php
// =============================================================================
// TEMPLATE NAME: Advance Data Set
// -----------------------------------------------------------------------------
// =============================================================================
?>
<?php
if (isset($_GET['click-type'])) {
	$clickType = strtolower($_GET['click-type']);
	$valuePer = get_field($clickType, 'option');
	update_field($clickType, $valuePer+1,  'option');
// 	echo $valuePer;
//     return $_GET['click-type'];
	
} else {
    // Fallback behaviour goes here
}
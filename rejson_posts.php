<?php

require('../../../wp-load.php' );



$term_id = $_GET['term_id'];
$paged = isset($_GET['page']) ? $_GET['page'] : 1;
$size = 9;


$args = array(
    'post_type'             => 'post',

    'posts_per_page'        => $size,//
    'orderby'=>array(
        'menu_order' => 'DESC',
        'post_date' => 'DESC'),
    'offset'          => $size*($paged-1),
    'tax_query'             => [
        'relation'    => 'AND',
        $term_id?[
            'taxonomy'     => 'category',
            'field'        => 'slug',
            'terms'        => explode(',',$term_id),
            'operator'     => 'in'
        ]:null
    ]

);
$count_arg = array(
    'post_type'             => 'post',
    'posts_per_page'        => -1,//
    'fields'             => 'ids',
    'tax_query'		  		=> [
        'relation'		=> 'AND',
        $term_id?[
            'taxonomy'     => 'category',
            'field'        => 'slug',
            'terms'        => explode(',',$term_id),
            'operator'     => 'in'
        ]:null
    ]

);

$count = get_posts($count_arg);
$products = get_posts($args);
$rejson = [];
foreach($products as $k =>$v) {
    $te1 = $v->ID;
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $te1 ), 'large' );
    if ($img){
            $img = $img[0];
        }else{
            $oldImg = get_post_meta($te1, 'featured_image_old')[0];
            if ($oldImg){
                $img = $oldImg;
            }else{
                $img = '/wp-content/uploads/2022/05/Mask-group-31.jpg';
            }
        }
	//$oldImg = get_post_meta($te1, 'featured_image_old')[0];
    //$img = $img ? $img : $oldImg ? $oldImg :'/wp-content/uploads/2022/05/Mask-group-31.jpg';
    $rejson[] = [
        'id'=>$te1,
        'img'=>$img,
        //'oldimg'=>get_post_meta($te1, 'featured_image_old')[0],
        'alt'=>getImageAlt($img),
        'name'=>$v->post_title,
        'jump_url'=>get_permalink($te1),
        'desc'=>$v->post_excerpt,
        'date'=>date('M d, Y',strtotime($v->post_date)),
		'gt_translate_keys' => ['name', 'desc', 'jump_url', 'date']
    ];

}

$page_num = ceil(count($count)/$size);
echo json_encode([
    'page_num'=>$page_num,
    'page'=>$paged,
    'data'=>$rejson
])

?>
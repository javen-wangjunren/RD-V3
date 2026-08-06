<?php

require('../../../wp-load.php');


$term_id = $_GET['term_id'];
$paged = isset($_GET['page']) ? $_GET['page'] : 1;
$kw = $_GET['kw'] ?: '';

$size = 9;
$page_num = 1;
$paged = 1;
if ($kw || $term_id) {
    $args = array(
        'post_type' => 'knowledge_base',

        'posts_per_page' => $size,//
        's' => $kw,
        'orderby' => array(
            'menu_order' => 'DESC',
            'post_date' => 'DESC'),
        'offset' => $size * ($paged - 1),
        'tax_query' => [
            'relation' => 'AND',
            $term_id ? [
                'taxonomy' => 'knowledge_base_catory',
                'field' => 'slug',
                'terms' => explode(',', $term_id),
                'operator' => 'in'
            ] : null
        ]

    );
    $count_arg = array(
        'post_type' => 'knowledge_base',
        'posts_per_page' => -1,//
        'fields' => 'ids',
        's' => $kw,
        'tax_query' => [
            'relation' => 'AND',
            $term_id ? [
                'taxonomy' => 'knowledge_base_catory',
                'field' => 'slug',
                'terms' => explode(',', $term_id),
                'operator' => 'in'
            ] : null
        ]

    );

    $count = get_posts($count_arg);
    $products = get_posts($args);
    $rejson = [];
    foreach ($products as $k => $v) {
        $te1 = $v->ID;
        $img = get_the_post_thumbnail_url($te1, 'full');
        $img = $img ?: '/wp-content/uploads/2022/05/Mask-group-31.jpg';
        $rejson[] = [
            'id' => $te1,
            'img' => $img,
            'alt' => getImageAlt($img),
            'name' => $v->post_title,
            'jump_url' => get_permalink($te1),
            'desc' => $v->post_excerpt,
            'date' => date('M d, Y', strtotime($v->post_date))
        ];

    }

    $page_num = ceil(count($count) / $size);
}else{
    //默认展示分类
    $get_terms = get_terms(["taxonomy" => "knowledge_base_catory", "hide_empty" => false, "parent" => 0]);
    $rejson = [];
    foreach ($get_terms as $k => $v) {
        $img = get_field('feature_img', 'knowledge_base_catory_' . $v->term_id);
        $img = $img ? $img : '/wp-content/uploads/2022/05/Mask-group-31.jpg';
		$jumpUrl = get_field('knowledge_base_category_page_url', 'knowledge_base_catory_' . $v->term_id);
		if(!$jumpUrl){
			$jumpUrl = get_category_link($v);
		}
        $rejson[] = [
            'img' => $img,
            'alt' => getImageAlt($img),
            'name' => $v->name,
            'jump_url' => $jumpUrl,
            'desc' => $v->description,
            'date' => ''
        ];

    }
}
echo json_encode([
    'page_num' => $page_num,
    'page' => $paged,
    'data' => $rejson
])

?>
<?php

require('../../../wp-load.php' );



$industries = $_GET['industries'];
$services = $_GET['services'];
$paged = isset($_GET['page']) ? $_GET['page'] : 1;
$size = 6;


$args = array(
    'post_type'             => 'cases_studies',

    'posts_per_page'        => $size,//
    'orderby'=>array(
        'menu_order' => 'DESC',
        'post_date' => 'DESC'),
    'offset'          => $size*($paged-1),
    'tax_query'             => [
        'relation'    => 'AND',
        $industries?[
            'taxonomy'     => 'industries',
            'field'        => 'slug',
            'terms'        => explode(',',$industries),
            'operator'     => 'in'
        ]:null,$services?[
            'taxonomy'     => 'services',
            'field'        => 'slug',
            'terms'        => explode(',',$services),
            'operator'     => 'in'
        ]:null,
    ]

);
$count_arg = array(
    'post_type'             => 'cases_studies',
    'fields'             => 'ids',
    'posts_per_page'        => -1,//
    'tax_query'		  		=> [
        'relation'		=> 'AND',
        $industries?[
            'taxonomy'     => 'industries',
            'field'        => 'slug',
            'terms'        => explode(',',$industries),
            'operator'     => 'in'
        ]:null,$services?[
            'taxonomy'     => 'services',
            'field'        => 'slug',
            'terms'        => explode(',',$services),
            'operator'     => 'in'
        ]:null,
    ]

);

$count = get_posts($count_arg);
//var_dump($count);die;
$products = get_posts($args);
wp_count_posts();
$rejson = [];
foreach($products as $k =>$v) {
    $te1 = $v->ID;
    $img = get_the_post_thumbnail_url($te1, 'full');
    $img = $img?:'http://via.placeholder.com/385x285';
    $rejson[] = [
        'id'=>$te1,
        'img'=>$img,
        'alt'=>getImageAlt($img),
        'name'=>$v->post_title,
        'jump_url'=>get_permalink($te1),
        'desc'=>$v->post_excerpt,
        'date'=>date('M d, Y',strtotime($v->post_date))
    ];

}

$page_num = ceil(count($count)/$size);
echo json_encode([
    'page_num'=>$page_num,
    'page'=>$paged,
    'data'=>$rejson
])

?>
<?php

require('../../../wp-load.php' );



$kw = $_GET['kw'];
$post_type = $_GET['post_type'];
if (!$post_type){
    $post_type = ['post','new','knowledge_base'];
}else{
    $post_type = [$post_type];
}
$count = 0;
$size = 6;
$paged = isset($_GET['page']) ? $_GET['page'] : 1;

if ($kw !== '') {
    $args = array(
        'post_type'             => $post_type,
        's'=>$kw,
        'posts_per_page'        => $size,//
        'orderby'=>array(
            'menu_order' => 'DESC',
            'post_date' => 'DESC'),
        'offset'          => $size*($paged-1),
    );
    $count_arg = array(
        'post_type'             => $post_type,
        'fields'             => 'ids',
        'posts_per_page'        => -1,//
        's'=>$kw

    );

add_filter( 'posts_where', 'title_filter', 10, 2 );
    $count = get_posts($count_arg);
//var_dump($count);die;
    $pros = get_posts($args);
remove_filter( 'posts_where', 'title_filter', 10, 2 );

}

$rejson = [];
$count_html = '';
if ($kw !== ''){
    if ($count){
        $count_html = 'Here are <span class="num">'.count($count).'</span> results matched with your search. In case you need more, please feel free to <a href="/contact">contact us</a> for a free consultation.';
    }else{
        $count_html = 'An apology that there is <span class="num">0</span> result here matching for your search item of <span>'.$kw.'</span>. Please kindly check and search again, or <a href="/contact">contact us</a> for a free consultation.';
    }
}
foreach($pros as $k =>$v) {
    $te1 = $v->ID;
    $img = get_the_post_thumbnail_url($te1, 'full');
    $img = $img?:'/wp-content/themes/mml-theme/dist/img/Mask group.jpg';

//    var_dump($pros);die;
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
    'data'=>$rejson,
    'count_html'=>$count_html
])

?>
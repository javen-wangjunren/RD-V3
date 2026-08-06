<?php

global $wp_query;
$obj = $wp_query->get_queried_object();
// echo '<div class="mml-breadcrumb">';
// echo '<div class="mml-breadcrumb-bd">';
// echo '<a href="#">Back<i class="fas fa-chevron-right"></i></a>';
// echo '<a href="/">Home <i class="fas fa-chevron-right"></i></a>';
// echo '<span>Why do residential areas need to install courtyard lights?</span>';
// echo '</div>';
// echo '</div>';
$arr = [];
if ($obj instanceof WP_Post) {
        $arr[] = [
                'text' => $obj->post_title
        ];
        if ($obj->post_type === 'portfolio') {
                $terms = wp_get_object_terms($obj->ID, 'portfolio_types');
                $term = $terms[0];
                $arr[] = [
                        'text' => $term->name,
                        'link' => get_category_link($term->term_id)
                ];
                while ($term->parent !== 0) {
                        $term = get_term($term->parent);
                        $arr[] = [
                                'text' => $term->name,
                                'link' => get_category_link($term->term_id)
                        ];
                }
        } else if ($obj->post_type === 'post') {
                $arr[] = [
                    'text' => 'Blogs',
                    'link' => '/blogs/'
                ];
        } else {
                //
        }

} else if ($obj instanceof WP_Term) {
        $term = get_term($obj->term_id);
        $arr[] = [
                'text' => $term->name,
                // 'link' => get_category_link($term->term_id)
        ];
        while ($term->parent !== 0) {
                $term = get_term($term->parent);
                $arr[] = [
                        'text' => $term->name,
                        'link' => get_category_link($term->term_id)
                ];
        }
} else if (is_search()) {
        $arr[] = [
                'text' => 'Search'
        ];
}
$arr[] = [
        'text' => 'Home',
        'link' => '/'
];
$item = array_pop($arr);
echo '<div class="mml-breadcrumb" style="margin-top: 20px;">
        <div class="mml-breadcrumb-bd">';
//                 <a href="#">Home <i class="fas fa-chevron-right"></i></a>
//                 <a href="#">Blog <i class="fas fa-chevron-right"></i></a>
//                 <span>Why do residential areas need to install courtyard lights?</span>
// var_dump($item);

while ($item) {
        if (count($arr) > 0) {
                echo '<a href="'.$item['link'].'">';
                echo $item['text'];
                echo '</a>'; 
                echo '&nbsp&nbsp;>&nbsp&nbsp;';

        } else {
                echo '<strong>'.$item['text'].'</strong>';
        }
        $item = array_pop($arr);
}
echo '</div></div>';

<?php

$posts = get_field('posts');
if (!$posts) {
    $args = array(
        'post_type' => get_queried_object()->post_type,
        'post__not_in' => [get_queried_object()->ID],
        'posts_per_page' => 4,//
        'orderby' => array(
            'menu_order' => 'DESC',
            'post_date' => 'DESC'),
    );

    $posts1 = get_posts($args);
} else {
    $posts1 = [];
    foreach ($posts as $post) {
        $posts1[] = get_post($post['post']);
    }
}

?>
<div class="related-cases">
    <div class="grid-container">
        <?php   foreach ($posts1 as $post): ?>
            <?php
            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            if ($img){
                $img = $img[0];
            }else{
                $oldImg = get_post_meta($post->ID, 'featured_image_old')[0];
                if ($oldImg){
                    $img = $oldImg;
                }else{
                    $img = '/wp-content/uploads/2022/05/Mask-group-31.jpg';
                }
            }
            ?>
        <div class="grid-item post-item-2">
            <a href="<?php echo  get_permalink($post) ?>">
                <?php echo  mml_get_lazyload_image_by_url($img) ?>
            </a>
            <div class="content">
                <h3><a href="<?php echo  get_permalink($post) ?>"><?php echo  $post->post_title ?></a></h3>
                <p><?php echo  get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) ?></p>
            </div>
<!--            <div class="post-date">March 3, 2022</div>-->
            <div class="post-date"><?php  echo date('jS M, Y', strtotime($post->post_date))   ?></div>
        </div>
        <?php   endforeach; ?>
    </div>
</div>
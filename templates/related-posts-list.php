<?php
    $posts = get_field('posts');
    if (!$posts){
        $args = array(
            'post_type'             => get_queried_object()->post_type,
            'post__not_in'=>[get_queried_object()->ID],
            'posts_per_page'        => 3,//
            'orderby'=>array(
                'menu_order' => 'DESC',
                'post_date' => 'DESC'),
        );

        $posts1 = get_posts($args);
    }else{
        $posts1 = [];
        foreach ($posts as $post){
            $posts1[] = get_post($post['post']);
        }
    }

?>
<div class="related-posts-list">
    <?php   foreach ($posts1 as $post): ?>
        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
//        $img = $img? $img[0]:'http://via.placeholder.com/1200x800.png'; ?>
    <?php
        if ($img){
            $img = $img[0];
        }else{
            $oldImg = get_post_meta($post->ID, 'featured_image_old')[0];
            if ($oldImg){
                $img = $oldImg;
            }else{
                $img = 'http://via.placeholder.com/1200x800.png';
            }
        }
        ?>

    <div class="related-post-item">
        <div class="flex-container">
            <div class="left">
                <a href="<?php echo  get_permalink($post) ?>">
                    <?php echo  mml_get_lazyload_image_by_url($img) ?>
                </a>
            </div>
            <div class="right">
                <h4>
                    <a href="<?php echo  get_permalink($post) ?>"><?php echo  $post->post_title ?></a>
                </h4>
                <p><?php echo  get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) ?></p>
            </div>
        </div>
    </div>
    <?php   endforeach; ?>
</div>
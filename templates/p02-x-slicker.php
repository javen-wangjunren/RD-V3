<?php
$infos = get_field('gallery_parts');
?>
<?php   if ($infos){
    $infos = array_chunk($infos,6);
    ?>
<div class="p02-x-slicker">
    <div class="content-show-slicker">
        <?php   foreach ($infos as $info1){ ?>
        <div class="item">
            <div class="grid-container">
                <?php   foreach ($info1 as $info){
                    if ($info['post']){
                        $item = get_post($info['post']);
                    }else{
                        $item = '';
                    }
                    ?>
                <div class="grid-item">
                    <div class="img-wrap">
                        <?php echo  mml_get_lazyload_image_by_url($info['img']?:'/wp-content/uploads/2022/05/Mask-group-31.jpg') ?>
                        <div class="cover">
                            <p><?php echo  $info['desc'] ?></p>
                            <div class="btn-wrap">
                                <a href="<?php echo  $item?get_permalink($item):'javascript:;' ?>" class="red-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <h3><a href="<?php echo  $item?get_permalink($item):'javascript:;' ?>"><?php echo  $info['title']?:($item?$item->post_title:'') ?></a></h3>
                </div>
                <?php   } ?>
            </div>
        </div>
        <?php   } ?>
    </div>
</div>
<?php   } ?>

<?php
$infos = get_fields();
?>
<?php   if ($infos['our_platform']): ?>
<div class="p05-2-slicker">
    <?php   foreach ($infos['our_platform'] as $info){ ?>
    <div class="item">
        <div class="flex-container">
            <div class="left">
                <?php echo  mml_get_lazyload_image_by_url($info['img']?:'/wp-content/uploads/2022/05/Mask-group-22.jpg') ?>
            </div>
            <div class="right">
                <div class="content">
                    <h3><?php echo  $info['title'] ?></h3>
                    <p><?php echo  $info['desc'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php   } ?>
</div>
<?php   endif; ?>

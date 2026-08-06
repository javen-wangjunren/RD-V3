<?php
$infos = get_fields();
?>

<?php   if ($infos['support']){ ?>
<div class="p05-3-tab">
    <div class="flex-container">
        <div class="tab-content-list">
            <?php   foreach ($infos['support'] as $k =>$info){ ?>
            <div class="tab-content-item <?php echo  $k==0?'active':'' ?>">
                <?php echo  mml_get_lazyload_image_by_url($info['img']?:'https://via.placeholder.com/700x850') ?>
            </div>
            <?php   } ?>
        </div>
        <div class="tab-btn-list">
            <?php   foreach ($infos['support'] as $k =>$info){ ?>
            <div class="tab-btn-item <?php echo  $k==0?'active':'' ?>">
                <div class="title-wrap">
                    <h3><?php echo  $info['title'] ?></h3>
                    <div class="icon-wrap">
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </div>
                </div>
                <div class="main-content">
                    <?php   foreach ($info['infos'] as $info1){ ?>
                    <div class="rich-wrap">
                        <?php echo  $info1['info'] ?>
                    </div>
                    <?php   } ?>
                </div>
            </div>
            <?php   } ?>

        </div>
    </div>
</div>
<?php   } ?>

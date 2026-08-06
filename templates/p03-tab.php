
<?php
$infos = get_field('applications_for_industry');
?>

<?php   if ($infos) {?>
<style>
.red-btn{
background-color:#EA543F;
}
.red-btn:hover{
background-color:#FF6550;
}
</style>
<div class="p03-tab">
    <div class="flex-container">
        <div class="tab-btn-list">
            <?php   foreach ($infos as $k=> $info){ ?>
            <div class="tab-btn-item <?php echo  $k==0?'active':"" ?>">
                <h3><?php echo  $info['title'] ?></h3>
                <div class="dot"></div>
            </div>
            <?php   } ?>

        </div>
        <div class="tab-content-list">
            <?php   foreach ($infos as $k=> $info){ ?>

            <div class="tab-content-item <?php echo  $k==0?'active':"" ?>">
                <h3><?php echo  $info['title'] ?></h3>
                <p><?php echo  $info['desc'] ?></p>
                <div class="content-container">
                    <div class="img-wrap">
                        <?php echo  mml_get_lazyload_image_by_url($info['img']?:"/wp-content/themes/mml-theme/dist/img/shutterstock_319537412 1.png") ?>
                    </div>
                    <div class="text-wrap">
                        <h4><?php echo  $info['sub_title'] ?></h4>
                        <p><?php echo  $info['sub_desc'] ?></p>
                        <?php   if ($info['links']){ ?>
                        <ul>
                            <?php   foreach ($info['links'] as $link){ ?>
                            <li><a href="<?php echo  $link['link'] ?>"><?php echo  $link['title'] ?></a></li>
                            <?php   } ?>
                        </ul>
                        <?php   } ?>
                        <div class="btn-wrap">
                            <a href="https://app.rapiddirect.com/" class="red-btn">Get Instant Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php   } ?>
        </div>
    </div>
</div>
<?php   } ?>
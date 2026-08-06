<?php
$fields = get_fields();
?>
<?php   if ($fields['our_manufacturing_capabilities']){ ?>
<style>
.blue-btn{
background-color:#EA543F;
}
.blue-btn:hover{
background-color:#FF6550;
}
</style>
<div class="p01-s01-slicker">
    <div class="slicker-wrap">
        <div class="manufacturing-content-slicker">
            <?php   foreach ($fields['our_manufacturing_capabilities'] as $field){$item = get_post($field['page']) ?>

            <div class="item">
                <div class="img-wrap">
                    <?php echo  mml_get_lazyload_image_by_url($field['img']?:'/wp-content/uploads/2022/05/Mask-group-1.jpg') ?>
                    <div class="cover">
                        <h3><?php echo  $field['title'] ?></h3>
                        <p><?php echo  $field['desc'] ?></p>
                        <a href="<?php echo  ($field['page']) ?>" class="blue-btn">Learn More</a>
                    </div>
                </div>
                <p><?php echo  $field['title'] ?></p>
            </div>
            <?php   } ?>
            <!-- <div class="item">
                <div class="img-wrap">
                    <img src="/wp-content/uploads/2022/05/Mask-group-1.jpg" alt="">
                    <div class="cover">
                        <h3>CNC Machining</h3>
                        <p>Fast and precise CNC machining through the use of state-of-the-art 3-axis and 5-axis equipment and lathes.</p>
                        <a href="javascript:;" class="blue-btn">Learn More</a>
                    </div>
                </div>
                <p>CNC Machining</p>
            </div> -->
        </div>
        <div class="mml-row">
            <div class="arrow-btn-wrap">
                <span class="arrow-btn arrow-left"><i class="fas fa-caret-left"></i></span>
                <span class="arrow-btn arrow-right"><i class="fas fa-caret-right"></i></span>
            </div>
        </div>
    </div>
</div>
<?php   } ?>
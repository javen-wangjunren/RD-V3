<?php

$infos = get_field('tab_infos');
?>

<?php if ($infos[0]) { ?>
    <div class="p02-x-tab">
        <div class="flex-container">
            <div class="left">
                <?php foreach ($infos as $k => $info): ?>
                    <img src="<?php echo $info['img'] ?: 'https://via.placeholder.com/827x514' ?>" alt="image"
                         class="<?php echo $k == 0 ? 'active' : '' ?>">
                <?php endforeach; ?>
            </div>
            <div class="right">
                <?php foreach ($infos as $k => $info): ?>
                    <div class="item <?php echo $k == 0 ? 'active' : '' ?>">
                        <h3><?php echo  $info['title'] ?></h3>
                        <p><?php echo  $info['desc'] ?></p>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
<?php } ?>
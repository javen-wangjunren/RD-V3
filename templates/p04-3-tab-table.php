<?php

$fields = get_fields();
?>
<?php if ($fields['materials']) { ?>
    <div class="p04-3-tab-table img-table">
        <div class="flex-container">
            <div class="tab-btn-wrap">
                <h2>Materials</h2>
                <div class="tab-btn-list">
                    <?php foreach ($fields['materials'] as $k => $material) {
                        ?>
                        <div class="tab-btn-item <?php echo $k == 0 ? 'active' : '' ?>"><?php echo $material['title'] ?></div>
                    <?php } ?>

                </div>
            </div>
            <div class="tab-content-wrap">

                <?php foreach ($fields['materials'] as $k => $material) { ?>
                    <div class="tab-content-item <?php echo $k == 0 ? 'active' : '' ?>">
                        <div class="table-wrap">
                            <?php echo $material['info'] ?>
                        </div>
                        <div class="btn-container">
                            <div class="btn-wrap">
                                <a href="https://app.rapiddirect.com/" class="red-btn">Request Instant Quote</a>
                                <?php if ($material['link']) { ?>
                                    <a href="<?php echo $material['link'] ?>"
                                       class="red-border-btn"><?php echo $material['btn_title'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
<?php } ?>

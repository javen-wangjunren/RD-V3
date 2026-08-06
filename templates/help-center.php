<?php
$get_terms = get_terms(["taxonomy" => "help_center_category", "hide_empty" => false, "parent" => 0]);

?>
<div class="help-center">
    <div class="help-center-list">
        <?php foreach ($get_terms as $term) {
            $infos = get_posts("posts_per_page=-1&help_center_category=$term->slug&post_type=help_center");
            if ($infos) {
                ?>
                <div class="help-center-item">
                    <h2><?php echo  $term->name ?></h2>
                    <div class="grid-container">
                        <?php   foreach ($infos as $info){ ?>
                        <div class="grid-item">
                            <a href="<?php echo  get_permalink($info) ?>"><?php echo  $info->post_title ?></a>
                        </div>
                    <?php   } ?>

                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>

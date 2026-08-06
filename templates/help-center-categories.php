<?php
$get_terms = get_terms(["taxonomy" => "help_center_category", "hide_empty" => false, "parent" => 0]);

?>
<div class="help-center-categories">
    <div class="first-level-list">
        <?php foreach ($get_terms as $k => $term) {
            $infos = get_posts("posts_per_page=-1&help_center_category=$term->slug&post_type=help_center");
            if ($infos) {
                ?>
                <div class="first-level-item">
                    <div class="first-level-content">
                        <div class="title"><?php echo $term->name ?></div>
                        <i class="fas fa-caret-down"></i>
                    </div>
                    <ul>
                        <?php foreach ($infos as $info) { ?>
                            <li class="<?php echo get_queried_object()->ID == $info->ID ? 'active' : '' ?>"><a
                                        href="<?php echo get_permalink($info) ?>"><?php echo $info->post_title ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }
        } ?>
    </div>
</div>
<script>
    var $ = jQuery;
    $(document).ready(function() {
        $('.first-level-item li.active').parent().parent().addClass('active')
    })
</script>

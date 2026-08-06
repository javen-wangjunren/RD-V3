<?php
$post_type_list = [
    'post' => 'category',
    'portfolio' => 'portfolio-types',
    'knowledge_base' => 'knowledge_base_catory',
];

$current_post_type = get_post_type();
$post = get_post();
$terms = get_the_terms($post->ID, $post_type_list[$current_post_type]);
?>
<?php if ($terms): ?>
    <div class="tagged">
        <div class="tagged_title">Tagged:</div>
        <div class="links">
            <?php   foreach ($terms as $term): ?>
            <a href="<?php echo  get_category_link($term) ?>"><?php echo  $term->name ?></a>
            
        <?php   endforeach; ?>
        </div>
    </div>
<?php endif; ?>
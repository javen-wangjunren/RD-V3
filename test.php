<?php
// =============================================================================
// TEMPLATE NAME: Test Template
// -----------------------------------------------------------------------------
// =============================================================================
?>
<!-- <?php 
// $i = 1;
// $args = array(
// 	'posts_per_page'  => -1,
// 	'post_type'     => 'post',
// 	'post_status'     => array('publish'), 
// 	'orderby' => 'publish_date',
// 	'order' => 'DESC',
// 	'paged'       => get_query_var('paged'),
// );
// $my_query = new WP_Query( $args );
// if( $my_query->have_posts() ): ?>
<?php //while ($my_query->have_posts()) : $my_query->the_post();
?>
<?php //$oldImg = get_post_meta($post->ID, 'featured_image_old')[0];
  //$i++; endwhile; ?>
             <?php //endif; ?>
<div class="blog-cta" style="background:url('<?= get_stylesheet_directory_uri();?>/images/cta-bg.svg')">
	<div class="bg-cta-inner">
		<div class="text-cta">
			<div class="main-text-cta">
				Try RapidDirect Now!
			</div>
			<div class="sub-text-cta">
				All information and uploads are secure and confidential.
			</div>
		</div>
		<div class="btn-cta">
			<div class="elementor-button-wrapper mt-24 text-center">
				<span class="elementor-button-link elementor-button elementor-size-lg button-shortcode" role="button">
					Upload Your Design
				</span>
			</div>
		</div>
	</div>
</div> -->
<?php //get_header();?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
	
function copy_acf_fields($source_id, $target_id, $allowed_keys = null) {
    // Get all field objects for the source post
    $fields = get_field_objects($source_id);

    if (empty($fields)) {
        error_log("No ACF fields found for source ID {$source_id}");
        return false;
    }

    foreach ($fields as $field_name => $field) {
        // If specific keys/names provided, skip others
        if ($allowed_keys && !in_array($field_name, $allowed_keys)) {
            continue;
        }

        // Get the field value from source
        $value = get_field($field_name, $source_id);
		
		print_r($value);
        // Update the same field on target
        // 
        update_field($field['key'], $value, $target_id);
    }

    return true;
}
copy_acf_fields(91658, 44, ['image_height_77', 'number_of_slides_77', 'repeater_gallery']);

 ?>
<style>
	.mt-3{
		margin-top: 16px;
	}
	.fs-14{
		font-size: 14px;
	}
	.icon-tabs-p0 li a .active-image{
		display: none;
	}
	.icon-tabs-p0 li a.active{
		font-weight: 700;
	}
	.icon-tabs-p0 li a.active .active-image{
		display: inline-block;
		box-shadow: 0 0 8px #EA543F66;
		border-radius: 50%;
	}
	.icon-tabs-p0 li a.active .non-active-image{
		display: none;
	}
	.color-orange{
		color: #EA543F;
	}
	.mt-40{
		margin-top: 40px;
	}
	.ps-40{
		padding-left: 40px;
	}
	.ul-mb-4 ul li{
		margin-bottom: 24px;
	}
	.justify-center{
		justify-content: center;
	}
	.list-three li a{
		margin-left: 16px;
	}
</style>

<?php

// Only run export when ?export=1 is passed
if (isset($_GET['export'])) {
	if (ob_get_length()) {
        ob_end_clean();
    }

    // Post type slugs
    $parent_type = 'topic';
    $child1_type = 'sub_topic';
    $child2_type = 'answer';

    // Custom fields
    $child1_parent_field = 'related_topic';   // child1 → parent relation
    $child2_parent_field = 'related_sub_topic';   // child2 → child1 relation

    // Fetch all parents
    $parents = get_posts([
        'post_type'      => $parent_type,
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);

    if (!$parents) {
        wp_die('No parent posts found.');
    }

    // CSV headers
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=export_relations.csv');

    $output = fopen('php://output', 'w');

    // CSV header row
    fputcsv($output, ['No', 'Topic ID', 'Topic Title', 'Sub Topic ID', 'Sub Topic Title', 'Answer ID', 'Answer Title', 'Answer']);
	$i = 1;
    foreach ($parents as $parent) {
        // Find child1 posts that point to this parent
        $child1_posts = get_posts([
            'post_type'      => $child1_type,
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'meta_query'     => [
                [
                    'key'   => $child1_parent_field,
                    'value' => $parent->ID,
                ]
            ]
        ]);

        if ($child1_posts) {
            foreach ($child1_posts as $child1) {
                // Find child2 posts that point to this child1
                $child2_posts = get_posts([
                    'post_type'      => $child2_type,
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'meta_query'     => [
                        [
                            'key'   => $child2_parent_field,
                            'value' => $child1->ID,
                        ]
                    ]
                ]);

                if ($child2_posts) {
                    foreach ($child2_posts as $child2) {
                        fputcsv($output, [
							$i,
                            $parent->ID, $parent->post_title,
                            $child1->ID, $child1->post_title,
                            $child2->ID, $child2->post_title,
							wp_strip_all_tags($child2->post_content)
                        ]);
						$i++;
                    }
                } else {
                    // Write row if child1 has no child2
                    fputcsv($output, [
                        $parent->ID, $parent->post_title,
                        $child1->ID, $child1->post_title,
                        '', ''
                    ]);
                }
            }
        } else {
            // Write row if parent has no child1
            fputcsv($output, [
                $parent->ID, $parent->post_title,
                '', '', '', ''
            ]);
        }
    }

    fclose($output);
    exit;
}
?>

<div class="wrap">
    <h1>Export Relations Test Page</h1>
    <p><a class="button button-primary" href="?export=1">Download CSV</a></p>
</div>

<?php if( have_rows('icons_tabs_image_with_text') ): 
	$tab1_rep = 0;
?>
<div class="container">
	<div class="elementor-section mega-mat-tabs">
		<div class="elementor-container-xx">
			<div class="d-block">
				<div class="w-100 ">
					<ul class="nav nav-tabs list-three icon-tabs-p0 justify-center" role="tablist">
						<?php if( have_rows('icons_tabs_image_with_text') ): 
						$tab1_rep = 0;
						?>
						<?php while( have_rows('icons_tabs_image_with_text') ): the_row(); ?>
						<li class="nav-item">
							<a class="nav-link <?php if($tab1_rep == 0){echo 'active';}?>" data-bs-toggle="tab" href="#icontab-<?= $tab1_rep;?>">
								<div class="text-center">
									<img src="<?= the_sub_field('icon');?>" class="d-inline-block non-active-image" width="64px" alt="icon for <?= the_sub_field('title');?>">
									<img src="<?= the_sub_field('icon_copy');?>" class="d-inline-block active-image" width="64px" alt="active icon for <?= the_sub_field('title');?>">
								</div>
								<div class="mt-3 fs-14">
									<?= the_sub_field('title');?>
								</div>
							</a>
						</li>
						<?php $tab1_rep++; endwhile;?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="d-block">
				<div class="tab-content tab-pane-pd-0 mt-40">
					<?php if( have_rows('icons_tabs_image_with_text') ): 
						$tab1_rep = 0;
						?>
					<?php while( have_rows('icons_tabs_image_with_text') ): the_row(); ?>
					<div id="icontab-<?= $tab1_rep;?>" class="container tab-pane <?php if($tab1_rep == 0){echo 'active';}?>">
						<h3 class="color-orange fw-700">
							<?= the_sub_field('title');?>
						</h3>
						<div class="mt-3">
							<?= the_sub_field('description');?>
						</div>
						<div class="mt-40 elementor-container">
							<div class="elementor-column elementor-col-30 elementor-inner-column d-block">
								<img class="w-100" src="<?= get_sub_field('image')['url'];?>" alt="<?= get_sub_field('image')['alt'];?>">
							</div>
							<div class="elementor-column elementor-col-70 elementor-inner-column d-block ps-40">
								<div class="special-ul-text check-ul ul-mb-4">
									<?= the_sub_field('text');?>
								</div>
							</div>
						</div>
					</div>
					<?php $tab1_rep++; endwhile;?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<br><br><br><br>
<div class="container mt-3">
	<?php //echo do_shortcode('[nested-tabs]');?>
</div>
<?php //get_footer();?>
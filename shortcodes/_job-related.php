<?php // Add this to your theme's functions.php or a custom plugin
function nuo_related_jobs_elementor_shortcode2($atts) {
    global $post;

//     if ($post->post_type !== 'job') return '';

    $current_job_id = $post->ID;

    $args = array(
        'post_type'      => 'job',
        'posts_per_page' => 3,
        'post__not_in'   => array($current_job_id),
        'orderby'        => 'rand',
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) return '';

    ob_start();
    ?>
    <!-- Flex container for 3 cards in a row -->
    <div class="elementor-element elementor-element-related-jobs e-con-full e-flex e-con e-child" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: space-between;     flex-direction: row; padding: 0px;">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php 
            $job_location = get_field('location') ?: 'Location';
            $job_design   = get_field('department') ?: 'design';
            $job_type     = get_field('job_type') ?: 'Full-time';
            ?>
            <div class="elementor-element elementor-element-job-card e-con-full e-flex e-con e-child" style="flex: 1 1 calc(33% - 13.33px); background-color: #FFFFFF; box-shadow: 0px 2.88px 2.88px 0px rgba(0,0,0,0.10); border: 1px solid #C7C7C7; border-radius: 20px; padding: 30px; min-width: 250px;">
                
                <!-- Job Title -->
                <div class="elementor-element elementor-widget elementor-widget-heading">
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default"><?php the_title(); ?></h3>
                    </div>
                </div>

                <!-- Location -->
                <div class="elementor-element elementor-widget elementor-widget-heading">
                    <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default"><?= get_field('job_location_io89');?></div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="elementor-element elementor-element-job-tags e-con-full e-flex e-con e-child" style="padding:0px;">
                    <div class="elementor-element elementor-widget elementor-widget-heading">
                        <div class="elementor-widget-container">
                            <span class="job-design"><?= get_field('job_type_io89');?></span>
                            <span class="job-type"><?= get_field('job_department_io89');?></span>
                        </div>
                    </div>
                </div>

                <!-- View Details -->
                <div class="elementor-element elementor-widget elementor-widget-heading">
                    <div class="elementor-widget-container">
                        <div class="elementor-heading-title elementor-size-default">
                            <a href="<?php the_permalink(); ?>" style="color:#EA543F;">View Details →</a>
                        </div>
                    </div>
                </div>

            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <!-- Styles -->
    <style>
    .job-design {
        color: #0070FF;
        background-color: #EFF6FF;
        border-radius: 20px;
        display: inline-block;
        padding: 5px 15px;
        margin-right: 5px;
    }
    .job-type {
        color: #15AF44;
        background-color: #F0FDF4;
        border-radius: 20px;
        display: inline-block;
        padding: 5px 15px;
    }
    </style>
    <?php
    return ob_get_clean();
}

add_shortcode('related_jobs', 'nuo_related_jobs_elementor_shortcode2');
?>
<?php
function nuo_job_list_shortcode2() {
    ob_start(); // Start output buffering
    ?>
    <style>
    .job-card {
      background: #ffffff;
      padding: 32px 48px;
      border-radius: 12px;
      box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.15)!important;
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 40px;
    }
    .job-meta svg {
      width: 18px;
      height: 18px;
    }
	/* Hover Effect */
    .job-card:hover {
      background: #EA543F;
    }
    .job-card:hover .job-title,
    .job-card:hover .job-meta,
    .job-card:hover .job-desc,
	.job-card:hover p{
      color: #ffffff;
    }
    .job-card:hover .job-meta svg path {
      fill: #ffffff;
    }
    </style>
    <?php
    $args = array(
        'post_type' => 'job',
        'posts_per_page' => -1,
    );
    $jobs = new WP_Query($args);

    if ($jobs->have_posts()) :
        while ($jobs->have_posts()) : $jobs->the_post(); ?>
            
            <a class="job-card <?= sanitize_title(get_field('job_location_io89'))?> <?= sanitize_title(get_field('job_type_io89'))?> <?= sanitize_title(get_field('job_department_io89'))?>" href="<?php the_permalink(); ?>" data-location="<?= get_field('job_location_io89');?>" data-type="<?= get_field('job_type_io89');?>" data-department="<?= get_field('job_department_io89');?>">
                <h3 class="job-title"><?php the_title(); ?></h3>

                <div class="job-meta">
                    <?= get_field('job_department_io89');?> &nbsp;&nbsp;
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.0018 0.801758C8.45197 0.801758 5.57422 3.67951 5.57422 7.22935C5.5768 8.31919 5.8565 9.39062 6.11703 9.86663L12.0018 23.1979L17.626 10.3427H17.623C18.1513 9.39003 18.4288 8.3187 18.4294 7.22935C18.4294 3.67951 15.5517 0.801758 12.0018 0.801758ZM12.0018 4.01551C12.4239 4.01551 12.8418 4.09864 13.2317 4.26015C13.6216 4.42166 13.9759 4.65839 14.2743 4.95683C14.5727 5.25526 14.8095 5.60955 14.971 5.99947C15.1325 6.38939 15.2156 6.80731 15.2156 7.22935C15.2156 8.08169 14.877 8.89912 14.2743 9.50182C13.6716 10.1045 12.8542 10.4431 12.0018 10.4431C11.1495 10.4431 10.332 10.1045 9.72935 9.50182C9.12665 8.89912 8.78806 8.08169 8.78806 7.22935C8.78806 6.37701 9.12665 5.55958 9.72935 4.95689C10.332 4.35419 11.1495 4.0156 12.0018 4.0156V4.01551Z" fill="#EA543F"/>
                    </svg>
                    <?= get_field('job_location_io89');?>
                </div>

                <p class="job-desc">
                    <?= get_field('custom_text_on_job_box_io89');?>
                </p>
            </a>

        <?php endwhile;
        wp_reset_postdata();
    endif;

    return ob_get_clean(); // Return the buffered output
}
add_shortcode('job-list', 'nuo_job_list_shortcode2');
?>
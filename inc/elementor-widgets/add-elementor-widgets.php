<?php

add_action( 'elementor/widgets/widgets_registered', function() {

    include_once('mml_breadcrumbs.php');
    $elementor_mml_breadcrumbs = new Elementor\Widget_mml_breadcrumbs();
    // Let Elementor know about our widget
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( $elementor_mml_breadcrumbs );

	// require_once('MML_ContactInfo_Widgets.php');
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Mobile1() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Mobile2() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Phone1() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Phone2() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Email1() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Email2() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Fax1() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Fax2() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Whatsapp() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Address() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Copyright() );

	// require_once('MML_Social_Widgets.php');
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Facebook() );
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_ContactInfo_Widget_Twitter() );

	// require_once('MML_Category_Widget.php');
	// Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_Category_Widget() );

	require_once('MML_Tab_Widget.php');
	Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MML\Elementor\MML_Tab_Widget() );
});

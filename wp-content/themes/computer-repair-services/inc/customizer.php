<?php
/**
 * Computer Repair Services Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Computer Repair Services
 */

use WPTRT\Customize\Section\Computer_Repair_Services_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Computer_Repair_Services_Button::class );

    $manager->add_section(
        new Computer_Repair_Services_Button( $manager, 'computer_repair_services_pro', [
            'title'       => __( 'Computer Repair Pro', 'computer-repair-services' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'computer-repair-services' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/computer-wordpress-theme/', 'computer-repair-services')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'computer-repair-services-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'computer-repair-services-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function computer_repair_services_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Header
    $wp_customize->add_section('computer_repair_services_header',array(
        'title' => esc_html__('Header Option','computer-repair-services')
    ));

    $wp_customize->add_setting('computer_repair_services_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_address',array(
        'label' => esc_html__('Address','computer-repair-services'),
        'section' => 'computer_repair_services_header',
        'setting' => 'computer_repair_services_address',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('computer_repair_services_email',array(
        'label' => esc_html__('Email Address','computer-repair-services'),
        'section' => 'computer_repair_services_header',
        'setting' => 'computer_repair_services_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'computer_repair_services_sanitize_phone_number'
    ));
    $wp_customize->add_control('computer_repair_services_phone_number',array(
        'label' => esc_html__('Phone Number','computer-repair-services'),
        'section' => 'computer_repair_services_header',
        'setting' => 'computer_repair_services_phone_number',
        'type'  => 'text'
    ));

    //Social Icon
    $wp_customize->add_section('computer_repair_services_media',array(
        'title' => esc_html__('Social Media Option','computer-repair-services')
    ));

    $wp_customize->add_setting('computer_repair_services_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_facebook_url',array(
        'label' => esc_html__('Facebook URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_intagram_url',array(
        'label' => esc_html__('Instagram URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_linkedin_url',array(
        'label' => esc_html__('Linkdin URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_youtube_url',array(
        'label' => esc_html__('Youtube URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_youtube_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('computer_repair_services_watsapp_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('computer_repair_services_watsapp_url',array(
        'label' => esc_html__('Watsapp URL','computer-repair-services'),
        'section' => 'computer_repair_services_media',
        'setting' => 'computer_repair_services_watsapp_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('computer_repair_services_top_slider',array(
        'title' => esc_html__('Slider Option','computer-repair-services')
    ));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'computer_repair_services_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'computer_repair_services_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'computer_repair_services_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'computer-repair-services' ),
            'section'  => 'computer_repair_services_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //About Us
    $wp_customize->add_section('computer_repair_services_new_project',array(
        'title' => esc_html__('About Us','computer-repair-services'),
        'description' => esc_html__('Here you have to select about page which will display perticular about section in the home page.','computer-repair-services')
    ));

    $wp_customize->add_setting( 'computer_repair_services_about_page', array(
        'default'           => '',
        'sanitize_callback' => 'computer_repair_services_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'computer_repair_services_about_page', array(
        'label'    => __( 'Select About Page', 'computer-repair-services' ),
        'section'  => 'computer_repair_services_new_project',
        'type'     => 'dropdown-pages'
    ) ); 

    $wp_customize->add_setting('computer_repair_services_about_image_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_about_image_text',array(
        'label' => esc_html__('About Text','computer-repair-services'),
        'section' => 'computer_repair_services_new_project',
        'setting' => 'computer_repair_services_about_image_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_about_support_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_about_support_text',array(
        'label' => esc_html__('Support Text','computer-repair-services'),
        'section' => 'computer_repair_services_new_project',
        'setting' => 'computer_repair_services_about_support_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('computer_repair_services_about_team_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('computer_repair_services_about_team_text',array(
        'label' => esc_html__('Team Text','computer-repair-services'),
        'section' => 'computer_repair_services_new_project',
        'setting' => 'computer_repair_services_about_team_text',
        'type'  => 'text'
    ));
    
    // Footer
    $wp_customize->add_section('computer_repair_services_site_footer_section', array(
        'title' => esc_html__('Footer', 'computer-repair-services'),
    ));

    $wp_customize->add_setting('computer_repair_services_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('computer_repair_services_footer_text_setting', array(
        'label' => __('Replace the footer text', 'computer-repair-services'),
        'section' => 'computer_repair_services_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'computer_repair_services_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function computer_repair_services_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function computer_repair_services_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function computer_repair_services_customize_preview_js(){
    wp_enqueue_script('computer-repair-services-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'computer_repair_services_customize_preview_js');
<?php 
/**
 * @Packge     : breed
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'breed_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_general_options_section',
        'default'     => '#1345e6',
    )
);


// Instagram api key field
$url = 'https://www.instagram.com/developer/authentication/';

Epsilon_Customizer::add_field(
	'breed_igaccess_token',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Instagram Access Token', 'breed' ),
		'description' => sprintf( __( 'Set instagram access token. To get access token %s click here %s.', 'breed' ), '<a target="_blank" href="'.esc_url( $url ).'">', '</a>' ),
		'section' => 'breed_general_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '',

	)
);

/***********************************
 * Header Section Fields
 ***********************************/


// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'breed_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Background Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_headertop_options_section',
        'default'     => '',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'breed_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_headertop_options_section',
        'default'     => 'rgba(255,255,255, 0.95)',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'breed_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_headertop_options_section',
        'default'     => '#2a2a2a',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'breed_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_headertop_options_section',
        'default'     => '#ed239f',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'breed_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_headertop_options_section',
        'default'     => '#2a2a2a',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'breed_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_headertop_options_section',
        'default'     => '#ed239f',
    )
);


// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'breed_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fafafa',
    )
);





/***********************************
 * Blog Section Fields
 ***********************************/

// Post excerpt length field
Epsilon_Customizer::add_field(
    'breed_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'breed' ),
        'description' => esc_html__( 'Set post excerpt length.', 'breed' ),
        'section'     => 'breed_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'breed-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'breed' ),
        'section'  => 'breed_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'breed' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'BREED_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'breed-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'breed' ),
        'section'     => 'breed_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'breed-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'breed' ),
        'section'     => 'breed_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'breed-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'breed' ),
		'section'  => 'breed_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'breed' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg'
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'breed_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'breed' ),
        'section'           => 'breed_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'breed_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'breed' ),
        'section'           => 'breed_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'breed_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'breed_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'breed_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'breed-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'breed' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'breed' ),
        'section'     => 'breed_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'breed' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'breed-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'breed' ),
        'section'     => 'breed_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'breed_footer_logo',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Logo', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
    )
);// Footer widget background color field
Epsilon_Customizer::add_field(
    'breed_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'breed_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#fff8f7',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'breed_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'breed_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#2f2d4e',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'breed_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'breed_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#ed239f',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'breed_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#fff8f7',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'breed_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#666',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'breed_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#ed239f',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'breed_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'breed' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'breed_footer_options_section',
        'default'     => '#ed239f',
    )
);

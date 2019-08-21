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
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'breed_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'breed' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'breed_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'breed' ),
            'panel'    => 'breed_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'breed_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'breed' ),
            'panel'    => 'breed_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'breed_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'breed' ),
            'panel'    => 'breed_options_panel',
            'priority' => 3,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'breed_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'breed' ),
			'panel'    => 'breed_options_panel',
			'priority' => 4,
		),
    ),
    

	/**
     * 404 Page Section
     */
    array(
        'id'   => 'breed_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'breed' ),
            'panel'    => 'breed_options_panel',
            'priority' => 7,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'breed_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'breed' ),
            'panel'    => 'breed_options_panel',
            'priority' => 8,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

<?php 
/**
 * @Packge 	   : breed
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'breed_preloader', 'breed_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'breed_header', 'breed_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'breed_footer', 'breed_footer_area', 10 );
add_action( 'breed_footer', 'breed_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'breed_wrp_start', 'breed_wrp_start_cb', 10 );
add_action( 'breed_wrp_end', 'breed_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'breed_page_wrp_start', 'breed_page_wrp_start_cb', 10 );
add_action( 'breed_page_wrp_end', 'breed_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'breed_blog_col_start', 'breed_blog_col_start_cb', 10 );
add_action( 'breed_blog_col_end', 'breed_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'breed_page_col_start', 'breed_page_col_start_cb', 10 );
add_action( 'breed_page_col_end', 'breed_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'breed_blog_posts_thumb', 'breed_blog_posts_thumb_cb', 10 );
/**
 * Hook for blog posts Date Meta.
 */
add_action( 'breed_blog_post_date', 'breed_blog_post_date_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'breed_blog_posts_title', 'breed_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'breed_blog_posts_meta', 'breed_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'breed_blog_posts_bottom_meta', 'breed_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'breed_blog_posts_excerpt', 'breed_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'breed_blog_posts_content', 'breed_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'breed_blog_sidebar', 'breed_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'breed_page_sidebar', 'breed_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'breed_blog_posts_share', 'breed_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'breed_blog_single_meta', 'breed_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'breed_blog_single_footer_nav', 'breed_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'breed_page_content', 'breed_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'breed_fof', 'breed_fof_cb', 10 );

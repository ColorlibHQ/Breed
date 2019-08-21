<?php
/**
 * @Packge     : Animalshelter
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// enqueue css
function breed_common_custom_css() {

	wp_enqueue_style( 'breed-common', get_template_directory_uri().'/assets/css/common.css' );

	$headerbgcolor     = esc_attr( breed_opt( 'breed_headerbgcolor' ) );
	$headerOverlay     = esc_attr( breed_opt( 'breed_headeroverlaycolor' ) );
	$navbarbg 		   = esc_attr( breed_opt( 'breed_header_navbar_bgColor' ) );
	$stickynavbarbg    = esc_attr( breed_opt( 'breed_header_navbarsticky_bgColor' ) );
	$navmenuColor 			= esc_attr( breed_opt( 'breed_header_navbar_menuColor' ) );
	$navmenuHovColor 		= esc_attr( breed_opt( 'breed_header_navbar_menuHovColor') );
	$stickynavmenuColor 	= esc_attr( breed_opt( 'breed_header_sticky_navbar_menuColor') );
	$stickynavmenuHovColor 	= esc_attr( breed_opt( 'breed_header_sticky_navbar_menuHovColor' ) );
	$foftext1     	   = esc_attr( breed_opt( 'breed_fof_textonecolor_settings' ) );
	$foftext2     	   = esc_attr( breed_opt( 'breed_fof_texttwocolor_settings' ) );
	$fofbgcolor        = esc_attr( breed_opt( 'breed_fof_bgcolor_settings' ) );
	$footerbgImg       = breed_opt( 'breed_footer_bgimg_settings' );

	$footerbgImg = json_decode( $footerbgImg );

	$footerbgImgAttr = '';

	if( ! empty( $footerbgImg->url ) ) {
		$footerbgImgAttr = 'background-image:url( ' .esc_url( $footerbgImg->url ). ' );';
	}

	$footerbgColor     = esc_attr( breed_opt( 'breed_footer_widget_bgColor_settings' ) );
	$footerTextColor   = esc_attr( breed_opt( 'breed_footer_widget_color_settings' ) );
	$anchorcolor 	   = esc_attr( breed_opt( 'breed_footer_widget_anchorcolor_settings' ) );
	$anchorhovcolor    = esc_attr( breed_opt( 'breed_footer_widget_anchorhovcolor_settings' ) );
	$widgettitlecolor  = esc_attr( breed_opt( 'breed_footer_widgettitlecolor_settings' ) );
	$themecolor  	   = esc_attr( breed_opt( 'breed_themecolor' ) );

	$footerbtombg  	   			= esc_attr( breed_opt( 'breed_footer_bottom_bgcolor_settings' ) );
	$footerbtomtextcolor 		= esc_attr( breed_opt( 'breed_footer_bottom_textcolor_settings' ) );
	$footerbtomanchorcolor 		= esc_attr( breed_opt( 'breed_footer_bottom_anchorcolor_settings' ) );
	$footerbtomanchorhovercolor = esc_attr( breed_opt( 'breed_footer_bottom_anchorhovercolor_settings' ) );

	$themeImg = get_template_directory_uri().'/assets/img/';

	$customcss ="

			.global-banner,
			.causes_slider .owl-dots .owl-dot.active,
			.causes_item .causes_img .c_parcent span,
			.causes_item .causes_img .c_parcent span:before,
			.causes_item .causes_bottom a,
			.tags .tag_btn:before,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .tagcloud a:hover,
			.link-border:before,
			.single_portfolio:hover .overlay
			{
				background-color: {$themecolor};
			}

			b, 
			sup, 
			sub, 
			u,
			del,
			.l_blog_item .l_blog_text h4:hover,
			.causes_item .causes_text h4:hover,
			.blog_right_sidebar .post_category_widget .cat-list li:hover a,
			.blog_right_sidebar .widget_breed_recent_widget .post_item .media-body h3:hover,
			.single-post-area .navigation-top .social-icons li:hover i,
			.single-post-area .navigation-top .social-icons li:hover span,
			.comments-area .btn-reply:hover,
			.wpcf7-form label,
			.sample-text-area p b,
			.sample-text-area p i,
			.sample-text-area p sup,
			.sample-text-area p sub,
			.sample-text-area p del,
			.sample-text-area p u,
			.link-border,
			.portfolio_area .filters ul li:hover,
			.portfolio_area .filters ul li.active,
			.single-blog .meta-top a:hover,
			.blog_right_sidebar .widget_categories ul li:hover a,
			.blog_right_sidebar .widget_rss ul li:hover a,
			.blog_right_sidebar .widget_recent_entries ul li:hover a,
			.blog_right_sidebar .widget_recent_comments ul li:hover a,
			.blog_right_sidebar .widget_archive ul li:hover a,
			.blog_right_sidebar .widget_meta ul li:hover a,
			.blog_right_sidebar .widget_nav_menu ul li a:hover,
			.blog_right_sidebar .widget_pages ul li a:hover,
			.ui-state-active,
			.ui-state-highlight,
			.widget_categories ul li a:hover 
			{
				color: {$themecolor};
			}
			
			.causes_item .causes_bottom a,
			.single-post-area .quotes,
			.link-border,
			.wp-block-quote p,
			blockquote p
			{
				border-color: {$themecolor};
			}
			
			.global-banner .overlay-bg {
				background-color: {$headerOverlay}
			} 
			.global-banner {
				background-color: {$headerbgcolor}
			}

			#f0f{
				background-color: {$fofbgcolor}
			}
			.inner-child-fof .h1 {
				color: {$foftext1}
			}
			.inner-child-fof a,
			.inner-child-fof p {
				color: {$foftext2}
			}
			.footer-area{
				{$footerbgImgAttr}
				background-color: {$footerbgColor};
				color: {$footerTextColor};
			}
			caption,
			.footer-area .single-footer-widget p,
			.single-footer-widget,
			footer {
				color: {$footerTextColor};
			}
			.footer-area .single-footer-widget ul li a,
			.footer-area .footer-widget ul li a,
			.single-footer-widget a,
			.footer-widget a {
				color: {$anchorcolor};
			}
			.footer-area .single-footer-widget a:hover,
			.footer-area .single-footer-widget ul li a:hover,
			.footer-bottom a:hover{
				color: {$anchorhovcolor};
			}
			.footer-area .single-footer-widget h4{
				color: {$widgettitlecolor};
			}
			.footer-area .copyright-text{
				background-color: {$footerbtombg};
			}
			.footer-area .footer-bottom p{
				color: {$footerbtomtextcolor};
			}
			.footer-area .footer-bottom p a,
			.footer-area .copyright-text .footer-social a {
				color: {$footerbtomanchorcolor};
			}
			.footer-area .copyright-text .footer-social a:hover,
			.footer-area .footer-bottom p a:hover{
				color: {$footerbtomanchorhovercolor};
			}
			.header_area {
				background-color: {$navbarbg};
			}
			.header_area.navbar_fixed .main_menu .navbar{
				background-color: {$stickynavbarbg};
			}
			.header_area .navbar .nav .nav-item .nav-link {
				color: {$navmenuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link, 
			.header_area .navbar .nav .nav-item.active .nav-link{
				color: {$navmenuHovColor};
			}
			.header_area.navbar_fixed .main_menu .navbar .nav .nav-item .nav-link,
			.header_area.navbar_fixed .navbar .nav li a {
				color: {$stickynavmenuColor};
			}
			.header_area.breed_home_page.navbar_fixed .main_menu .navbar .nav .nav-item:hover .nav-link,
			.header_area.breed_front_page.navbar_fixed .main_menu .navbar .nav .nav-item:hover .nav-link,
			.header_area.breed_home_page.navbar_fixed .navbar .nav li a:hover,
			.header_area.breed_front_page.navbar_fixed .navbar .nav li a:hover {
				color: {$stickynavmenuHovColor};
			}


        ";

	wp_add_inline_style( 'breed-common', $customcss );

}
add_action( 'wp_enqueue_scripts', 'breed_common_custom_css', 50 );
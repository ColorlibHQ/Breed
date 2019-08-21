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

// Sidebar
if( is_active_sidebar( 'breed-post-sidebar' ) ) {
	echo '<div class="col-lg-4"><div class="blog_right_sidebar">';
		dynamic_sidebar( 'breed-post-sidebar' );
	echo '</div></div>';
}
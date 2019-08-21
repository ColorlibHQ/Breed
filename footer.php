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

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook breed_footer
 *
 * @Hooked  breed_footer_area 10
 * @Hooked  breed_back_to_top 20
 *
 */

do_action( 'breed_footer' );

wp_footer(); 
?>
</body>
</html>
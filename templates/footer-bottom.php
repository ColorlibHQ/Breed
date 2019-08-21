<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'breed' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

?>

<div class="row footer_bottom justify-content-center">
    <p class="col-lg-8 col-sm-12 footer-text">
	    <?php echo wp_kses_post( breed_opt( 'breed-copyright-text-settings', $copyText ) ); ?>
    </p>
</div>
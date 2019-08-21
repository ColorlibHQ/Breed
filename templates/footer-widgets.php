<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="footer_top flex-column">
            <div class="footer_logo">
                <?php
                $footer_logo = breed_opt( 'breed_footer_logo' );
                $footer_logo_url = json_decode( $footer_logo );
                $siteUrl = home_url('/');
                if( !empty( $footer_logo_url->url ) ) {
	                echo '<a href="' . esc_url( $siteUrl ) . '"><img src="' . esc_url( $footer_logo_url->url ) . '" alt="'. esc_html__( 'footer logo', 'breed' ) .'"></a>';
                }
                ?>

                <?php
                if( has_nav_menu( 'footer-menu' ) ) {
	                ?>
                    <div class="d-lg-block d-none">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                            <div class="collapse navbar-collapse offset">
				                <?php
				                wp_nav_menu( array(
					                'theme_location' => 'footer-menu',
					                'container'      => '',
					                'depth'          => 1,
					                'menu_class'     => 'nav navbar-nav menu_nav mx-auto',
                                    'walker'         => new breed_footer_menu_navwalker()
				                ) );
				                ?>
                            </div>
                        </nav>
                    </div>
	                <?php
                } ?>
            </div>

	        <?php
	        if( has_nav_menu( 'social-menu' ) ) {
		        echo '<div class="footer_social mt-lg-0 mt-4">';
		        $args = array(
			        'theme_location' => 'social-menu',
			        'container'      => '',
			        'depth'          => 1,
			        'menu_class'     => 'footer-social',
			        'fallback_cb'    => 'breed_social_navwalker::fallback',
			        'walker'         => new breed_social_navwalker(),
		        );
		        wp_nav_menu( $args );
		        echo '</div>';
	        }
	        ?>
        </div>
    </div>
</div>
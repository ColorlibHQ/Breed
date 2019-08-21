
<header class="header_area header_inner_page <?php echo breed_header_class(); ?>">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <?php
                // Header Logo
                    echo breed_theme_logo( 'navbar-brand logo_inner_page logo_h' );
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <?php
                    //
                    if( has_nav_menu( 'primary-menu' ) ) {
                        $args = array(
                            'theme_location' => 'primary-menu',
                            'container'      => '',
                            'depth'          => 2,
                            'menu_class'     => 'nav navbar-nav menu_nav',
                            'fallback_cb'    => 'breed_bootstrap_navwalker::fallback',
                            'walker'         => new breed_bootstrap_navwalker(),
                        );  
                        wp_nav_menu( $args );
                    }
                    ?>
                    </div> 
                </div>
            </div>
        </nav>
    </div>
</header>


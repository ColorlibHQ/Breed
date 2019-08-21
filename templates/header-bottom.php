<?php 
	$id     = get_the_ID();
	$bgopt  = get_post_meta( absint( $id ), '_breed_builderpage_headerimg', true );

	$glob_class = ' global-banner';
	$setbgurl   = '';

	if ( $bgopt == 'featured' ) {
		$setbgurl   = get_the_post_thumbnail_url( absint( $id ) );
		$glob_class = '';
	}

	$headerBg     =  'style="background:url('.esc_url( get_header_image() ).')"';

	?>
    <section class="banner_area <?php echo esc_attr( $glob_class ) ?>" <?php if( !empty( get_header_image() ) ){ echo $headerBg; } ?>>
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <?php
					if ( is_archive() ) {
						the_archive_title('<h2 class="hero-title">', '</h2>');
					} elseif ( is_home() ) {
						echo '<h2 class="hero-title">'.esc_html__( 'Blog', 'breed' ).'</h2>';
					}
					elseif( is_singular('portfolio') ){
						the_title( '<h2 class="hero-title">', '</h2>' );
					}
					elseif( is_single() ){
						the_title( '<h2 class="hero-title">', '</h2>' );
					}
					elseif ( is_search() ) {
						echo '<h2 class="hero-title">'.esc_html__( 'Search Result', 'breed' ).'</h2>';
					} else {
						the_title( '<h2 class="hero-title">', '</h2>' );
					}

                    breed_breadcrumbs();
					?>
                </div>
            </div>
        </div>
    </section>

    <?php
    if( is_singular('portfolio') ){
	    $featured_img_url = get_the_post_thumbnail_url( $post->ID, 'breed_portfolio_945x495');
        ?>
        <section class="portfolio_details_area">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10">
                        <div class="portfolio_details_inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="left_img">
                                        <img class="img-fluid" src="<?php echo esc_url( $featured_img_url ); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	    <?php
    }
    ?>


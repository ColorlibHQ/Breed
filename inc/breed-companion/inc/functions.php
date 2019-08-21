<?php 
/**
 * @Packge     : breed Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'breed_360x310', 360, 355, true );
add_image_size( 'breed_portfolio_945x495', 945, 495, true );



// Instagram object Instance
function breed_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section ================================
function breed_blog_section( $postnumber ) {
     
    $date_format = get_option( 'date_format' );

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => esc_html( $postnumber ),
    );
    
    $query = new WP_Query( $args );
    
    if( $query->have_posts() ):
        while( $query->have_posts() ):
            $query->the_post();
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <?php
                    if( has_post_thumbnail() ) { ?>
                        <div class="thumb">
                            <?php
                            the_post_thumbnail( 'breed_360x310', array( 'class' => 'img-fluid' ) );
                            ?>
                        </div>
                        <?php
                    } ?>
                    <div class="short_details">
                        <div class="meta-top d-flex">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                <i class="ti-user"></i><?php the_author(); ?>
                            </a>
                            <a href="<?php echo breed_blog_date_permalink() ?>"><i class="ti-calendar"></i><?php the_time( $date_format ) ?></a>
                        </div>
                        <a class="d-block" href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <div class="text-wrap">
                            <p> <?php echo wp_trim_words( get_the_content(), 18, '' ) ?> </p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="primary_btn2"><?php echo esc_html__('Learn More', 'breed'); ?></a>
                    </div>
                </div>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}

// Portfolio Section ===========================
function breed_portfolio_section( $postnumber ) {

    $args = array(
        'post_type'      => 'portfolio',
        'posts_per_page' => esc_html( $postnumber ),
        'tax_query' => array(
	        array(
		        'taxonomy' => 'portfolio-cat',   // taxonomy name
		        'field' => 'portfolio-cat',           // term_id, slug or name
		        'terms' => 'portfolio-cat',                  // term id, term slug or term name
	        )
        )
    );

    $portfolio = new WP_Query( $args ); ?>

        <div class="filters portfolio-filter">
            <ul>
                <li class="active" data-filter="*">all</li>
                <?php

                $taxonomy = 'portfolio-cat';
                $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                if ( $terms && !is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        echo  '<li data-filter=".'.esc_attr($term->name).'">'.$term->name.'</li>';
                    }
                } ?>

            </ul>
        </div>

        <div class="filters-content">
            <div class="row portfolio-grid">
                <div class="grid-sizer col-md-1 col-lg-1"></div>
                <?php
                if( $portfolio->have_posts() ):
                    while( $portfolio->have_posts() ):
                        $portfolio->the_post();

	                    $taxonomy = get_object_term_cache( get_the_ID(), 'portfolio-cat' );
                            ?>

                            <div class="col-lg-4 col-md-4 all <?php foreach( $taxonomy as $tax ){ echo esc_attr( $tax->name). ' '; } ?> ">
                                <div class="single_portfolio">
                                    <?php
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail('', array( 'class' => 'img-fluid w-100' ));
                                    }
                                    ?>
                                    <div class="overlay"></div>
                                    <div class="short_info">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                        <?php

                                        if ( $terms && !is_wp_error( $terms ) ) {
                                            foreach ( $terms as $term ) {
                                                echo '<p>'. $term->name.'</p>';


                                            }
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    <?php
}



// Section Heading ===========================================
function breed_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                <?php 
                    // Title
                    if( $title ){
                        echo breed_heading_tag(
                            array(
                                'tag'    => 'h1',
                                'class'  => 'mb-10',
                                'text'   => esc_html( $title ),
                            )
                        );
                    }
                    // Sub Title
                    if( $subtitle ){
                        echo breed_paragraph_tag(
                            array(
                                'text'  => esc_html( $subtitle ),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    endif;
}

// Set contact form 7 default form template
function breed_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:primary_btn class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'breed_contact7_form_content', 10, 2 );





// Post View set
function breed_set_post_views($postID) {
	$count_key = 'breed_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}


// Elementor Custom Icon
function jet_modify_controls( $controls_registry ) {
	// Get existing icons
	$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
	// Append new icons
	$new_icons = array_merge(
		array(
			'flaticon-prize'    => 'Prize',
			'flaticon-earth-globe' => 'Globe',
			'flaticon-sing'     => 'Sing',
		),
		$icons
	);
	// Then we set a new list of icons as the options of the icon control
	$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
}
add_action( 'elementor/controls/controls_registered', 'jet_modify_controls', 10, 1 );



//Themify Icon
function breed_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}



/**
 * Enqueue editor styles for Gutenberg
 */
function breed_editor_styles() {
	wp_enqueue_style( 'breed-editor-style', get_template_directory_uri() . '/assets/css/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'breed_editor_styles' );

// Remove "span" wraper into form6
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

// Schedule Tab data
function return_tab_data( $getTags, $schedules ) {


	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $schedules as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}
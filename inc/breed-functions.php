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

// Image Crop Size
add_image_size( 'breed_750x375', 750, 375, true );


//Header Class
function breed_header_class(){

	if( is_front_page() ){
		$headerClass = 'breed_front_page';
	}
	else{
		$headerClass = 'breed_home_page';
	}
	return $headerClass;
}


 // theme option callback
function breed_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}

// Blog Date Permalink
function breed_blog_date_permalink() {
	
	$year       = get_the_time( 'Y' ); 
    $month_link = get_the_time( 'm' );
    $day        = get_the_time( 'd' );

    $link = get_day_link( $year, $month_link, $day );
    
    return $link; 
}

// Blog Excerpt Length
if ( ! function_exists( 'breed_excerpt_length' ) ) {
	function breed_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ) {
			$limit = $limit;
		} else {
			$limit = 30;
		}
		
		
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}

// Comment number and Link
if ( ! function_exists( 'breed_posted_comments' ) ) :
    function breed_posted_comments() {
        
        $comments_num = get_comments_number();
        if( comments_open() ) {
            if( $comments_num == 0 ) {
                $comments = esc_html__('0 Comment','breed');
            } elseif ( $comments_num > 1 ) {
                $comments= $comments_num . esc_html__(' Comments','breed');
            } else {
                $comments = esc_html__( '01 Comment','breed' );
            }
            $comments = '<a href="' . esc_url( get_comments_link() ) . '">'. $comments .'</a><span class="lnr lnr-bubble"></span>';
        } else {
            $comments = esc_html__( 'Comments are closed', 'breed' );
        }
        
        return $comments;
    }
endif;

//audio format iframe match 
function breed_iframe_match() {
    $audio_content = breed_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}

//Post embedded media
function breed_embedded_media( $type = array() ) {
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ) {
    
        if( count( $embed ) > 0 ) {
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else {
           $output = '';
        }
        
    } else {
        
        if( count( $embed ) > 0 ) {

            $output = $embed[0];
        } else {
           $output = ''; 
        }
        
    }
    
    return $output;
   
}
// WP post link pages
function breed_link_pages() {
    
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'breed' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'breed' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// theme logo
function breed_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( ! empty( $imageUrl[0] ) ) {
		$siteLogo = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $siteUrl ) . '"><img src="' . esc_url( $imageUrl[0] ) . '" alt="' . esc_attr( breed_image_alt( $imageUrl[0] ) ) . '"></a>';
	}else {
		$siteLogo = '<h1><a class="' . esc_attr( $class ) . '" href="' . esc_url( $siteUrl ) . '">' . esc_html( get_bloginfo('name') ) . '</a></h1><span class="header_logo">'. get_bloginfo( 'description' ) .'</span>';
	}
	
	return '<div id="logo">' . $siteLogo . '</div>';
	
}

// Blog pull right class callback
function breed_pull_right( $id = '', $condation ) {
    
    if( $id == $condation ) {
        return ' order-1';
    } else {
        return;
    }
    
}

// image alt tag
function breed_image_alt( $url = '' ) {

    if( $url != '' ) {
        // attachment id by url 
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag 
        $image_alt = get_post_meta( absint( $attachmentid ) , '_wp_attachment_image_alt', true );
        
        if( $image_alt ) {
            return $image_alt ;
        } else {
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );

            return $alt;
        }
   
    } else {
       return; 
    }

}

//  wysiwyg content output use in breed companion
function breed_get_textareahtml_output( $content ) {
    
	global $wp_embed;

	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}

// Slider list ( Shortcode ) select Options
function breed_get_slider_shortcode_options( $field ) {

    $args = $field->args( 'get_post_type' );
		
    $args = is_array( $args ) ? $args : array();

    $args = wp_parse_args( $args, array( 'post_type' => 'post' ) );

    $postType = $args['post_type'];

	$args = array(
		'post_type'        => $postType,
		'post_status'      => 'publish',
	);

	$posts_array = get_posts( $args );	

	// Initate an empty array
	$term_options = array();
		
	foreach( $posts_array as $post ) {
		
		$term_options[ $post->post_name ] = $post->post_title;
		
	}
	
    return $term_options;

}

// html Style tag for background image use in breed companion plugin
function breed_inline_bg_img( $bgUrl ) {
    $bg = '';

    if( $bgUrl ) {
        $bg = 'style="background-image:url(' . esc_url( $bgUrl ) . ')"'; 
    }

    return $bg;
}

//  customize blog sidebar option value return
function breed_sidebar_opt() {

    $sidebarOpt = breed_opt( 'breed-blog-sidebar-settings' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ) {
        $sidebarOpt =  $sidebarOpt;
    } else {
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ) {
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}

//  customize page sidebar option value return
function breed_page_sidebar_opt() {

    $pagesidebarOpt = breed_opt( 'breed-page-sidebar-settings' );
	$pagesidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $pagesidebarOpt ) ) {
	    $pagesidebarOpt =  $pagesidebarOpt;
    } else {
	    $pagesidebarOpt =  json_decode( $pagesidebarOpt, true );
    }


    if( !empty( $pagesidebarOpt['columnsCount'] ) ) {
        $pagesidebar = $pagesidebarOpt['columnsCount'];
    }


    return $pagesidebar;
}


// Custom Post Portfolio
add_action( 'init', 'breed_portfolio_post' );
/**
 * Register a portfolio post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function breed_portfolio_post() {
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'breed' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'breed' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'breed' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'breed' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'breed' ),
		'add_new_item'       => __( 'Add New Portfolio', 'breed' ),
		'new_item'           => __( 'New Portfolio', 'breed' ),
		'edit_item'          => __( 'Edit Portfolio', 'breed' ),
		'view_item'          => __( 'View Portfolio', 'breed' ),
		'all_items'          => __( 'All Portfolios', 'breed' ),
		'search_items'       => __( 'Search Portfolios', 'breed' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'breed' ),
		'not_found'          => __( 'No portfolios found.', 'breed' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'breed' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'breed' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-layout',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'portfolio', $args );

	$cat_labels = array(
		'name'              => _x( 'Category', 'taxonomy general name', 'breed' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'breed' ),
		'search_items'      => __( 'Search Category', 'breed' ),
		'all_items'         => __( 'All Category', 'breed' ),
		'parent_item'       => __( 'Parent Category', 'breed' ),
		'parent_item_colon' => __( 'Parent Category:', 'breed' ),
		'edit_item'         => __( 'Edit Category', 'breed' ),
		'update_item'       => __( 'Update Category', 'breed' ),
		'add_new_item'      => __( 'Add New Category', 'breed' ),
		'new_item_name'     => __( 'New Category Name', 'breed' ),
		'menu_name'         => __( 'Category', 'breed' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-cat' ),
	);

	register_taxonomy( 'portfolio-cat', array( 'portfolio' ), $args );
}
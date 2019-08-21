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

// Final Class
final class breed {

	// Theme Version
	private $breed_version = '1.0';

	// Minimum WordPress Version required
	private $min_wp = '4.0';

	// Minimum PHP version required 
	private $min_php = '5.6.25';

	function __construct(){

		// After setup theme
		add_action( 'after_setup_theme', array( $this, 'support' ) );

		// elementor flag
		add_action( 'after_switch_theme', array( $this, 'set_elementor_flag' ) );

		// Enqueue elementor theme default style 
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_elementor_theme_default_style' ) );

		// Enqueue elementor notice script
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_elementor_notice_script' ) );

		// Elementor desiable default style
		add_action( 'wp_ajax_elementor_desiable_default_style' , array( $this, 'elementor_desiable_default_style' ) );


		// initialize theme flag
		$this->init();


		
	}

	// Theme init
	public function init() {
		
		$this->setup();

		// customizer init Instantiate
		if( class_exists('Epsilon_Framework') ) {
			$this->customizer_init();
		}
		
		// Instantiate  Dashboard
		$Epsilon_init_Dashboard = Epsilon_init_Dashboard::get_instance();

	}

	// Theme setup
	private function setup() {
		
		// Create enqueue class instance
		$enqueu = new breed_Enqueue();
		$enqueu->scripts = $this->enqueue() ;
		$enqueu->breed_scripts_enqueue_init() ;

	}
	// Theme Support
	public function support() {
		// content width
        $GLOBALS['content_width'] = apply_filters( 'breed_content_width', 751 );

        
        // text domain for translation.
        load_theme_textdomain( 'breed', BREED_DIR_PATH . '/languages' );
        
        // support title tage
        add_theme_support( 'title-tag' );
        
        // support logo
        add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 150,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
        
        //  support post format
        add_theme_support( 'post-formats', array( 'video','audio' ) );
        
        // support post-thumbnails
        add_theme_support( 'post-thumbnails' );
		
		// Custom thumbnails size for widget post
		add_image_size( 'breed_widget_post_thumb', 80, 80, true );

		// Custom  thumbnails size for next prev thumb
		add_image_size( 'breed-np-thumb', 60, 60, true );

        // support custom background 
        add_theme_support( 'custom-background', array(
		'default-color' => '#fff',
		) );
        
        // support custom header
		add_theme_support( 'custom-header', array(
			'flex-width'    => true,
			'width'         => 1920,
			'flex-height'   => true,
			'height'        => 450,
			'default-image' => get_template_directory_uri() . '/assets/img/banner.png'
		) );
        
        // support automatic feed links
        add_theme_support( 'automatic-feed-links' );
        
        // support html5
        add_theme_support( 'html5' );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Gutenberg Fullwide support
		add_theme_support( 'align-wide' );

					    
        // register nav menu
        register_nav_menus( array(
            'primary-menu'   => esc_html__( 'Primary Menu', 'breed' ),
            'social-menu'   => esc_html__( 'Social Menu', 'breed' ),
            'footer-menu'   => esc_html__( 'Footer Menu', 'breed' )
        ) );

        // editor style
        add_editor_style('assets/css/editor-style.css');

	} // end support method

	// enqueue theme style and script
	private function enqueue() {

		$cssPath = BREED_DIR_CSS_URI;
		$jsPath  = BREED_DIR_JS_URI;
		
		$scripts = array(
			'style' => array(
				array(
					'handler'		=> 'google-font',
					'file' 			=> $this->google_font(),
				),
				array(
					'handler'		=> 'bootstrap',
					'file' 			=> $cssPath.'bootstrap.min.css',
					'dependency' 	=> array(),
					'version' 		=> '4.1.3',
				),
				array(
					'handler'		=> 'themify-icons',
					'file' 			=> $cssPath.'themify-icons.css',
					'dependency' 	=> array(),
					'version' 		=> '1.0',
				),
				array(
					'handler'		=> 'font-awesome-5',
					'file' 			=> $cssPath.'all.min.css',
					'dependency' 	=> array(),
					'version' 		=> '5.0',
				),

				array(
					'handler'		=> 'owl-carousel',
					'file' 			=> $cssPath.'owl.carousel.min.css',
					'dependency' 	=> array(),
					'version' 		=> '2.2.0',
				),
				array(
					'handler'		=> 'owl-theme-default',
					'file' 			=> $cssPath.'owl.theme.default.min.css',
					'dependency' 	=> array(),
					'version' 		=> '2.2.0',
				),
				array(
					'handler'		=> 'nice-select',
					'file' 			=> $cssPath.'nice-select.css',
					'dependency' 	=> array(),
					'version' 		=> '1.0.0',
				),
				array(
					'handler'		=> 'breed-main',
					'file' 			=> $cssPath.'main.css',
					'dependency' 	=> array(),
					'version' 		=> $this->breed_version,
				),
				array(
					'handler'		=> 'breed-style',
					'file' 			=> get_stylesheet_uri(),
				),
			),

			'scripts' => array(

				array(
					'handler'		=> 'bootstrap',
					'file' 			=> $jsPath.'bootstrap.min.js',
					'dependency' 	=> array( 'jquery' ),
					'version' 		=> '4.1.3',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'owl-carousel',
					'file' 			=> $jsPath.'owl.carousel.min.js',
					'dependency' 	=> array( 'jquery' ),
					'version' 		=> '2.2.0',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'stellar',
					'file' 			=> $jsPath.'stellar.js',
					'dependency' 	=> array(),
					'version' 		=> '1.0',
					'in_footer' 	=> true
				),

				array(
					'handler'		=> 'imagesloaded',
					'file' 			=> $jsPath.'imagesloaded.pkgd.min.js',
					'dependency' 	=> array(),
					'version' 		=> '3.0.4',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'isotope.pkgd',
					'file' 			=> $jsPath.'isotope.pkgd.min.js',
					'dependency' 	=> array(),
					'version' 		=> '3.0.4',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'ajaxchimp',
					'file' 			=> $jsPath.'jquery.ajaxchimp.min.js',
					'dependency' 	=> array( 'jquery' ),
					'version' 		=> '1.0.0',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'breed-main',
					'file' 			=> $jsPath.'main.js',
					'dependency' 	=> array( 'jquery', 'jquery-ui-datepicker' ),
					'version' 		=> $this->breed_version,
					'in_footer' 	=> true
				),
			)
		);

		return $scripts;

	} // end enqueu method 

	// Google Font  
	private function google_font() {

		$fontUrl = '';
		
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'breed' ) ) {
			
			$font_families = array(
				'Poppins:100,200,400,300,500,600,700'
			);

			$familyArgs = array(
				'family' => htmlentities( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin, latin-text' ),
			);

			$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
		}
		
		return esc_url_raw( $fontUrl );

	} //End google_font method


	/**
	 * Epsilon customizer
	 *
	 */

	// epsilon customizer init
	private function customizer_init() {

		// epsilon customizer quickie settings

		add_filter( 'epsilon_quickie_bar_shortcuts', array( $this, 'epsilon_quickie' ) );
		
		// Instantiate Epsilon Framework object
		$Epsilon_Framework = new Epsilon_Framework();

		
		// Instantiate breed theme customizer
		$breed_theme_customizer = new breed_theme_customizer();
	}

	public function epsilon_quickie() {

			return	array(

			'links' => array(
				array(
					'link_to'   => 'breed_options_panel',
					'icon'      => 'dashicons dashicons-admin-home',
					'link_type' => 'panel',
				),
				array(
					'link_to'   => 'nav_menus',
					'icon'      => 'dashicons dashicons-menu',
					'link_type' => 'panel',
				),
				array(
					'link_to'   => 'widgets',
					'icon'      => 'dashicons dashicons-archive',
					'link_type' => 'panel',
				),
				array(
					'link_to'   => 'custom_css',
					'icon'      => 'dashicons dashicons-editor-code',
					'link_type' => 'section',
				),

			),
			'logo'  => array(
				'url' => EPSILON_URI . '/assets/img/epsilon-logo.png',
				'alt' => 'Epsilon Builder Logo',
			),
		);

	}

	/**
	 * Notice for Elementor default style
	 *
	 */

	// Check elementor preview page
	public static function check_elementor_preview_page() {

		if( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) {
			return true;
		}

		return false;

	}

	// Set flag for elementor ( hooked in after switch theme )
	public function set_elementor_flag() {
		update_option( 'breed_had_elementor', 'no' );
	}

	// Elementor dsiable default style
	public function elementor_desiable_default_style() {

		$nonce = $_POST['nonce'];
		if ( ! wp_verify_nonce( $nonce, 'breed-elementor-notice-nonce' ) ) {
			return;
		}
		$reply = $_POST['reply'];
		if ( ! empty( $reply ) ) {
			if ( $reply == 'yes' ) {
				update_option( 'elementor_disable_color_schemes', 'yes' );
				update_option( 'elementor_disable_typography_schemes', 'yes' );
			}
			update_option( 'breed_had_elementor', 'yes' );
		}
		die();

	}

	// Enqueue theme default style for elementor
	public function enqueue_elementor_theme_default_style() {

		$disabled_color_schemes      = get_option( 'elementor_disable_color_schemes' );
		$disabled_typography_schemes = get_option( 'elementor_disable_typography_schemes' );

		if ( $disabled_color_schemes === 'yes' && $disabled_typography_schemes === 'yes' ) {
			wp_enqueue_style( 'breed-elementor-default-style',  BREED_DIR_CSS_URI. 'elementor-default-element-style.css', array(), $this->breed_version );
		}
	}
	
	// Enqueue elementor notice scripts
	public function enqueue_elementor_notice_script() {

		$had_elementor = get_option( 'breed_had_elementor' );

		if( $had_elementor == 'no' && self::check_elementor_preview_page() ) {
			wp_enqueue_script( 'breed-elementor-notice', BREED_DIR_JS_URI.'breed-elementor-notice.js', array('jquery'), '1.0', true );
			wp_localize_script(
				'breed-elementor-notice',
				'breedElementorNotice',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'breed-elementor-notice-nonce' ),
				)
			);
		}

	}

	
} // End Class


<?php
namespace breedelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * breed elementor section widget.
 *
 * @since 1.0
 */

class Breed_Clients extends Widget_Base {

	public function get_name() {
		return 'breed-clients';
	}

	public function get_title() {
		return __( 'Clients', 'breed' );
	}

	public function get_icon() {
		return 'eicon-logo';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {
        


        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'client_logo',
			[
				'label' => __( 'Client Logo', 'breed' ),
			]
        );
		$this->add_control(
			'logo_carousel', [
				'label' => __( 'Logo Carousel', 'breed' ),
				'type'  => Controls_Manager::GALLERY

			]
		);

		$this->end_controls_section(); // End Sponsor Company Logo


	}

	protected function render() {
    $this->load_widget_script();
    $settings = $this->get_settings();
    $logo_carousel = $settings['logo_carousel'];
    ?>

        <section class="brands-area section_gap_bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="owl-carousel brand-carousel">
                            <?php
                            if( !empty( $logo_carousel ) && count( $logo_carousel ) > 0 ){
                                foreach ( $logo_carousel as $logo ) { ?>
                                    <div class="single-brand-item d-table">
                                        <div class="d-table-cell">
                                        <?php echo '<img src="'. esc_url( $logo['url'] ) .'" alt="'. esc_html__('Client Logo', 'breed') .'">'; ?>
                                        </div>
                                    </div>
	                                <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php

    }
    // Js function support
	public function load_widget_script(){
		if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
			?>
            <script>
                ( function( $ ){

                    $('.brand-carousel').owlCarousel({
                        items: 1,
                        autoplay: false,
                        loop: true,
                        nav: false,
                        margin: 30,
                        dots: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            420: {
                                items: 1
                            },
                            480: {
                                items: 3
                            },
                            768: {
                                items: 3
                            },
                            992: {
                                items: 5
                            }
                        }
                    });

                })(jQuery);
            </script>
			<?php
		}
	}
	
}

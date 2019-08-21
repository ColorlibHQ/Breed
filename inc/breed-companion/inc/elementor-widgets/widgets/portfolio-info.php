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

class Breed_Portfolio_Info extends Widget_Base {

	public function get_name() {
		return 'breed-portfolio-info';
	}

	public function get_title() {
		return __( 'Portfolio info', 'breed' );
	}

	public function get_icon() {
		return 'eicon-info';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {
        


        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'client_logo',
			[
				'label' => __( 'Project Info', 'breed' ),
			]
        );
		$this->add_control(
			'info_desc', [
				'label' => __( 'Info Content', 'breed' ),
				'type'  => Controls_Manager::WYSIWYG,
                'default' => __('<h4>Project Info</h4><p>Made after a can\'t fruitful, fowl of greater saying years there saw you sea does</p>', 'breed')

			]
		);
		$this->add_control(
			'reviewstar', [
				'label' => __('Star Review', 'breed'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'1' => [
						'title' => __('1', 'breed'),
						'icon' => 'fa fa-star',
					],
					'2' => [
						'title' => __('2', 'breed'),
						'icon' => 'fa fa-star',
					],
					'3' => [
						'title' => __('3', 'breed'),
						'icon' => 'fa fa-star',
					],
					'4' => [
						'title' => __('4', 'breed'),
						'icon' => 'fa fa-star',
					],
					'5' => [
						'title' => __('5', 'breed'),
						'icon' => 'fa fa-star',
					],
				],

			]
		);

		$this->add_control(
			'project_info', [
				'label' => __( 'Project Info List', 'breed' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ label }}}',
				'fields' => [
					[
						'name'  => 'label',
						'label' => __( 'Label', 'breed' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('Client', 'breed')
					],
					[
						'name'  => 'value',
						'label' => __( 'Value', 'breed' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('Colorlib', 'breed')
					]

				],
			]
		);

		$this->end_controls_section(); // End Sponsor Company Logo


	}

	protected function render() {
    $settings = $this->get_settings();
    $star = $settings['reviewstar'];
    ?>

        <div class="portfolio_right_text mt-30">
            <?php
            if( !empty( $settings['info_desc'] ) ){
                echo wp_kses_post( $settings['info_desc'] );
            }
            ?>
            <ul class="list">

                <?php

                // Star Review
                if( !empty( $star ) ){
                    echo ' <li><span>Rating</span>:';

                    for ($i = 1; $i <= 5; $i++) {

                        if ($star >= $i) {
                            echo '<i class="fas fa-star"></i>';
                        } else {
                            echo '<i class="far fa-star"></i>';
                        }
                    }
	                echo '</li>';
                }

                // Info List
                if( !empty( $settings['project_info'] ) ){
                    foreach ( $settings['project_info'] as $info ){
                        echo '<li><span>'. esc_html( $info['label'] ) .'</span>: '. esc_html( $info['value'] ) .'</li>';
                    }
                }
                ?>
            </ul>
        </div>

    <?php

    }

	
}

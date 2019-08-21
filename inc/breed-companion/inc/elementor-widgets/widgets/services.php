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
 * breed elementor Team Member section widget.
 *
 * @since 1.0
 */
class Breed_Services extends Widget_Base {

	public function get_name() {
		return 'breed-services';
	}

	public function get_title() {
		return __( 'Services', 'breed' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {


        // -----------   Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'breed' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'breed' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __('What Service We <br> Offer For You', 'breed')

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'breed' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Our service', 'breed')

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'breed' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Service Item', 'breed' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'breed' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Web Development', 'breed')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'breed' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'breed' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
	                [
		                'name'  => 'btnlabel',
		                'label' => __( 'Button label', 'breed' ),
		                'type'  => Controls_Manager::TEXT,
		                'label_block' => true,
		                'default' => esc_html__('learn More', 'breed')
	                ],
                    [
		                'name'  => 'btnurl',
		                'label' => __( 'Button URL', 'breed' ),
		                'type'  => Controls_Manager::URL,
		                'label_block' => true
	                ]
                ],
            ]
		);

		$this->end_controls_section(); // End Services content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#05364d',
                'selectors' => [
                    '{{WRAPPER}} .main_title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .main_title p.top_text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'subtitle_border', [
                'label'     => __( 'Sub Title Border Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(237, 35, 159, 0.6)',
                'selectors' => [
                    '{{WRAPPER}} .main_title p.top_text span' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#05364d',
                'selectors' => [
                    '{{WRAPPER}} .service_item h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_title', [
                'label' => __( 'Title Hover Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_bg_color', [
                'label' => __( 'Service Background Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item' => 'background: {{VALUE}};',
                ],
                'default'   => '#f8faff'
            ]
        );
        $this->add_control(
            'service_hover_bg_color', [
                'label' => __( 'Service Hover Background Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover' => 'background: {{VALUE}};',
                ],
                'default'   => '#5f30ff'
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_desc_color', [
                'label' => __( 'Description Hover Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover p' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'btn_label_color', [
				'label' => __( 'Service Button Label Color', 'breed' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_item .primary_btn2' => 'color: {{VALUE}};',
				],
				'default'   => '#05364d'
			]
		);
		$this->add_control(
			'btn_hover_color', [
				'label' => __( 'Button Hover Label Color', 'breed' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_item:hover .primary_btn2' => 'color: {{VALUE}};',
				],
				'default'   => '#fff'
			]
		);
		$this->add_control(
			'service_btn_setting',
			[
				'label'     => __( 'Button Border Color', 'breed' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btnborder',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .primary_btn2:before',
			]
		);
		$this->add_control(
			'servicehover_btn_setting',
			[
				'label'     => __( 'Button Hover Border Color', 'breed' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .service_item:hover .primary_btn2:before',
			]
		);
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $services = $settings['services_content'];

    ?>
        <section class="services_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main_title">
                            <?php
                            if( !empty( $settings['sect_subtitle'] ) ){
                                echo '<p class="top_text">'. esc_html( $settings['sect_subtitle'] ) .' <span></span></p>';
                            }

                            if( !empty( $settings['sect_title'] ) ){
                                echo '<h2>'.wp_kses_post( $settings['sect_title'] ).'</h2>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if( !empty( $services ) && count( $services ) > 0 ){
                        foreach ( $services as $service ){ ?>
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="service_item">
                                    <?php
                                    if( !empty( $service['img']['url'] ) ){
                                        echo '<img src="'. esc_url( $service['img']['url'] ) .'" alt="'. esc_html__('service feature image', 'breed') .'">';
                                    }

                                    if( !empty( $service['label'] ) ){
                                        echo '<h4>'. esc_html( $service['label'] ) .'</h4>';
                                    }

                                    if( !empty( $service['desc'] ) ){
                                        echo '<p>'. esc_html( $service['desc'] ) .'</p>';
                                    }

                                    if( !empty( $service['btnlabel'] ) ){
                                        echo '<a href="'. esc_url( $service['btnurl']['url'] ) .'" class="primary_btn2 mt-35">'. esc_html( $service['btnlabel'] ) .'</a>';
                                    }
                                    ?>


                                </div>
                            </div>
                            <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </section>

    <?php

    }

}

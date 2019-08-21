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
class Breed_About extends Widget_Base {

	public function get_name() {
		return 'breed-about';
	}

	public function get_title() {
		return __( 'About', 'breed' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_sec',
			[
				'label' => __( 'About Us', 'breed' ),
			]
        );
        $this->add_control(
            'intro_title',
            [
                'label'         => esc_html__( 'Title Intro', 'breed' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'About me', 'breed' )
            ]
        );
        $this->add_control(
            'about_title',
            [
                'label'         => esc_html__( 'About Title', 'breed' ),
                'description'   => esc_html__('Use <br> tag for line break', 'breed'),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Creative Art Director <br> And Designer', 'breed' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'about_content',
            [
                'label'         => esc_html__( 'Content', 'breed' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label'         => esc_html__( 'Button Label', 'breed' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Learn More', 'breed' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'         => esc_html__( 'Button URL', 'breed' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true
            ]
        );

        $this->add_control(
            'feature_img',
            [
                'label'         => esc_html__( 'About Feature Image', 'breed' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );


        $this->end_controls_section(); // End about content
        

        // Section Style Setting
        $this->start_controls_section(
			'section_style',
			[
                'label' => __( 'Style', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
            'intro_title_color', [
                'label' => __( 'Intro Title Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main_title p.top_text' => 'color: {{VALUE}};',
                ],
                'default'   => '#797979'
            ]
        );
        $this->add_control(
            'intro_border_color', [
                'label' => __( 'Intro Border Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main_title p.top_text span' => 'background: {{VALUE}};',
                ],
                'default'   => 'rgba(237, 35, 159, 0.6)'
            ]
        );
        $this->add_control(
            'title_color', [
                'label' => __( 'Title Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area h2' => 'color: {{VALUE}};',
                ],
                'default'   => '#05364d'
            ]
        );
        $this->add_control(
            'about_btn_label_color', [
                'label' => __( 'Button Label Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .primary_btn' => 'color: {{VALUE}};',
                ],
                'default'   => '#fff'
            ]
        );
		$this->add_control(
			'btn_hover_label_color', [
				'label' => __( 'Button Hover Label Color', 'breed' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .primary_btn:hover' => 'color: {{VALUE}};',
				],
				'default'   => '#fff'
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Button background Color', 'breed' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg_color',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .about_area .primary_btn',
			]
		);
		$this->add_control(
			'btn_hover_bg',
			[
				'label' => __( 'Button Hover background Color', 'breed' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_hover_bg_color',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .about_area .primary_btn:hover',
			]
		);

        $this->end_controls_section(); // End about content
        

	}

	protected function render() {
    $settings = $this->get_settings();

    ?>

        <section class="about_area section_gap">
            <div class="container">
                <div class="row justify-content-start align-items-center">
                    <div class="col-lg-5">
                        <div class="about_img">
                            <?php
                            if( !empty( $settings['feature_img']['url'] ) ){
                                echo '<img class="" src="'. esc_url(  $settings['feature_img']['url'] ) .'" alt="'. esc_html__('about feature image', 'breed') .'">';
                            }
                            ?>

                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-5">
                        <div class="main_title text-left">
                            <?php
                            if( !empty( $settings['intro_title'] ) ){
                                echo '<p class="top_text">'. esc_html( $settings['intro_title'] ) .' <span></span></p>';
                            }

                            if( !empty( $settings['about_title'] ) ){
                                echo '<h2>'. wp_kses_post( $settings['about_title'] ) .'</h2>';
                            }

                            if( !empty( $settings['about_content'] ) ){
                                echo wp_kses_post( $settings['about_content'] );
                            }

                            if( !empty( $settings['btn_label'] ) ){
                                echo '<a class="primary_btn" href="'. esc_url( $settings['btn_url']['url'] ) .'"><span>'. esc_html( $settings['btn_label'] ) .'</span></a>';
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php

    }

}
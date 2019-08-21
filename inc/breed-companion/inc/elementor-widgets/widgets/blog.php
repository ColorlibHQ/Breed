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
 * breed elementor few words section widget.
 *
 * @since 1.0
 */

class Breed_Blog extends Widget_Base {

	public function get_name() {
		return 'breed-blog';
	}

	public function get_title() {
		return __( 'Blog', 'breed' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Blog', 'breed' ),
            ]
        );
        $this->add_control(
            'blog_limit',
            [
                'label'   => esc_html__( 'Post Limit', 'breed' ),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
				'max'     => 12,
				'step'    => 1,
                'default' => 3
            ]
        );
        $this->end_controls_section(); // End few words content

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


        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#05364d',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtext', [
                'label'     => __( 'Blog Meta Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .meta-top a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_bg', [
                'label'     => __( 'Blog Content Background Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f8faff',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .short_details' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_content_bg', [
                'label'     => __( 'Hover Content Background Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover .short_details' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border', [
                'label' => esc_html__('Button Border Style', 'breed'),
                'type'  => Controls_Manager::HEADING
            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_border_color',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .primary_btn2:before',
			]
		);
		$this->add_control(
            'btnhover_border', [
                'label' => esc_html__('Button Hover Border Style', 'breed'),
                'type'  => Controls_Manager::HEADING
            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btnhover_border_color',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .primary_btn2:hover:before',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    ?>

        <section class="blog-area section-gap">
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
	                // Blog
	                breed_blog_section( $settings['blog_limit'] );
	                ?>
                </div>
            </div>
        </section>

        <?php
    }
	
}

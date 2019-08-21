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
class Breed_Testimonial extends Widget_Base {

	public function get_name() {
		return 'breed-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'breed' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {


        // -----------   Section Heading ------------------------------
        $this->start_controls_section(
            'testimonial_heading',
            [
                'label' => __( 'Testimonial Section Heading', 'breed' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'breed' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'breed' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->end_controls_section(); // End section top content



		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'breed' ),
			]
		);
		
		$this->add_control(
            'testimonials', [
                'label' => __( 'Create Review', 'breed' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'breed' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'breed' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Designation', 'breed')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'breed' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'breed')
                    ],
	                [
		                'name' => 'reviewstar',
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
	                ],
                    [
                        'name'  => 'image',
                        'label' => __( 'Author Image', 'breed' ),
                        'type'  => Controls_Manager::MEDIA
                    ]
                    
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content


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


        $this->start_controls_section(
            'style_testimonial_item', [
                'label' => __( 'Style Testimonial Item', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'author_name_color', [
                'label'     => __( 'Testimonial Author Name Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#05364d',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-slider h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'author_designation_color', [
                'label'     => __( 'Testimonial Designation Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#5b6d75',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-slider p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_testimonial_desc',
                'selector'  => '{{WRAPPER}} .testimonial-slider p',
            ]
        );

        $this->end_controls_section();


        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'breed' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'breed' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'breed' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .testimonial-slider::after',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    $testimonials = $settings['testimonials'];
    ?>

    <section class="testimonial_area">
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

            <div class="owl-carousel owl-theme testimonial-slider ">
                <?php
                if( !empty( $testimonials ) && count( $testimonials ) > 0 ){
                    foreach ( $testimonials as $testimonial ){ ?>
                        <div class="testimonial-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="testi-img mb-4 mb-lg-0">
                                        <?php
                                        if( !empty( $testimonial['image']['url'] ) ){
                                            echo '<img src="'. esc_url( $testimonial['image']['url'] ) .'" alt="'. esc_html__( 'Testimonial Author', 'breed' ) .'">';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="testi-right">
                                        <?php
                                        // Name =======
                                        if ( ! empty( $testimonial['label'] ) ) {
                                            echo breed_heading_tag(
                                                array(
                                                    'tag'  => 'h4',
                                                    'text' => esc_html( $testimonial['label'] ),
                                                )
                                            );
                                        }
                                        // Designation
                                        if( ! empty( $testimonial['designation'] ) ) {
                                            echo '<p><small>'. esc_html( $testimonial['designation'] ) .'</small></p>';
                                        }
                                        // Description
                                        if( !empty( $testimonial['desc'] ) ){
	                                        echo '<p>'. esc_html( $testimonial['desc'] ) .'</p>';
                                        }


                                        // Star Review ==================
                                        $star = $testimonial['reviewstar'];
                                        if (!empty( $star )) {
	                                        echo '<ul class="star_rating mt-4">';
	                                        for ($i = 1; $i <= 5; $i++) {

		                                        if ($star >= $i) {
			                                        echo '<li><span><i class="fas fa-star"></i></span></li>';
		                                        } else {
			                                        echo '<li class="disable"><span><i class="fas fa-star"></i></span></li>';
		                                        }
	                                        }
	                                        echo '</ul>';
                                        }

                                        ?>
                                    </div>
                                </div>
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

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.testimonial-slider').owlCarousel({
                loop: false,
                margin: 30,
                items: 1,
                autoplay: false,
                smartSpeed: 2500,
                dots: true
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}

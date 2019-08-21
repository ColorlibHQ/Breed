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
 * breed elementor about us section widget.
 *
 * @since 1.0
 */
class Breed_Banner extends Widget_Base {

	public function get_name() {
		return 'breed-banner';
	}

	public function get_title() {
		return __( 'Banner', 'breed' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_content',
            [
                'label' => __( 'Banner Section Content', 'breed' ),
            ]
        );
        $this->add_control(
            'banner_title',
            [
                'label'         => esc_html__( 'Title ', 'breed' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'I AM JO BREED', 'breed' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_subtitle',
            [
                'label'         => esc_html__( 'Sub Title ', 'breed' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'Hey There!', 'breed' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_desc',
            [
                'label'         => esc_html__( 'Description', 'breed' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__( 'CREATIVE ART DIRECTOR & DESIGNER', 'breed' ),
                'label_block'   => true
            ]
        );

		$this->add_control(
			'socialprofiles', [
				'label' => __( 'Social Profiles', 'breed' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ name }}}',
				'fields' => [
					[
						'name'  => 'name',
						'label' => __( 'Item', 'breed' ),
						'type'  => Controls_Manager::TEXT
					],
					[
						'name'  => 'icon',
						'label' => __( 'Social Icon', 'breed' ),
						'type'  => Controls_Manager::ICON,
						'label_block' => true,
						'options'   => breed_themify_icon()
					],
					[
						'name'  => 'social_url',
						'label' => __( 'Social URL', 'breed' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true
					]

				],
			]
		);

        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'breed' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'See My Work', 'breed' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button URL', 'breed' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content


        // Hero Slider
        $this->start_controls_section(
            'hero_feature',
            [
                'label' => __( 'Banner Featured image', 'breed' ),
            ]
        );
        $this->add_control(
            'banner_img',
            [
                'label'         => esc_html__( 'Featured Image', 'breed' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End content



        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_textcolor', [
                'label' => __( 'Style Content', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titleone', [
                'label'     => __( 'Title Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#05364d',
                'selectors' => [
                    '{{WRAPPER}} .banner_content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .banner_content h1',
            ]
        );
        $this->add_control(
            'subtitle_color', [
                'label'     => __( 'Sub Title Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .banner_content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_subtitle',
                'selector'  => '{{WRAPPER}} .banner_content h3',
            ]
        );
        $this->add_control(
            'desc_color', [
                'label'     => __( 'Description Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#05364d',
                'selectors' => [
                    '{{WRAPPER}} .banner_content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_description',
                'selector'  => '{{WRAPPER}} .banner_content h5',
            ]
        );
		$this->add_control(
			'btn_label_color', [
				'label'     => __( 'Button Label Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .banner_content .primary_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_label_color', [
				'label'     => __( 'Button Hover Label Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .banner_content .primary_btn:hover' => 'color: {{VALUE}};',
				],
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
				'selector' => '{{WRAPPER}} .banner_content .primary_btn',
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
				'name' => 'btn_hoverbg_color',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .banner_content .primary_btn:hover',
			]
		);


        $this->end_controls_section();

        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Background', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'banner_bg',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .home_banner_area',
			]
		);


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    $social_profile = $settings['socialprofiles'];

    ?>

    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="banner_content">
	                        <?php
	                        // Banner Sub Title
	                        if( ! empty( $settings['banner_subtitle'] ) ) {
		                        echo breed_heading_tag(
			                        array(
				                        'tag'   => 'h3',
				                        'text'  => $settings['banner_subtitle']
			                        )
		                        );
	                        }
	                        // Banner Title
	                        if( ! empty( $settings['banner_title'] ) ) {
		                        echo breed_heading_tag(
			                        array(
				                        'tag'   => 'h1',
				                        'text'  => $settings['banner_title'],
                                        'class' => 'text-uppercase'
			                        )
		                        );
	                        }
	                        // Banner Description
	                        if( ! empty( $settings['banner_desc'] ) ) {
		                        echo breed_heading_tag(
			                        array(
				                        'tag'   => 'h5',
				                        'text'  => $settings['banner_desc'],
                                        'class' => 'text-uppercase'
			                        )
		                        );
	                        }
	                        ?>

                            <div class="social_icons my-5">
                                <?php
                                if( is_array( $social_profile ) && count( $social_profile ) > 0 ){
                                    foreach ( $social_profile as $item ){
                                        echo '<a href="'. esc_url( $item['social_url'] ) .'"><i class="'. esc_attr( $item['icon'] ) .'"></i></a>';
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            if( !empty( $settings['banner_btnlabel'] ) ){
                                echo '<a class="primary_btn" href="'. $settings['banner_btnurl']['url'] .'"><span>'. esc_html( $settings['banner_btnlabel'] ) .'</span></a>';
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="home_right_img">
                            <?php
                            if( !empty( $settings['banner_img']['url'] ) ){
                                echo '<img class="img-fluid" src="'. esc_url( $settings['banner_img']['url'] ) .'" alt="'. esc_html__('Banner feature image', 'breed') .'">';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    }
}
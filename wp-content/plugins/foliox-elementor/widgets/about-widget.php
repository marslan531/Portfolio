<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsAbout extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Elementor widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'bdevs-about';
    }

    /**
     * Get widget title.
     *
     * Retrieve Bdevs Elementor widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'About', 'bdevs-elementor' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Bdevs About widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-user-circle-o';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Bdevs About widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'bdevs-elementor' ];
    }

    public function get_keywords() {
        return [ 'about' ];
    }

    public function get_script_depends() {
        return [ 'bdevs-elementor'];
    }

    // BDT Position
    protected function element_pack_position() {
        $position_options = [
            ''              => esc_html__('Default', 'bdevs-elementor'),
            'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
            'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
            'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
            'center'        => esc_html__('Center', 'bdevs-elementor') ,
            'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
            'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
            'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
            'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
            'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
        ];

        return $position_options;
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content_heading',
            [
                'label' => esc_html__( 'About', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
                'default'     => __( 'About Me', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'A Passionate Developer Who Loves to Code', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image_1',
            [
                'label'   => esc_html__( 'Image 1', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
            ]
        ); 
        $this->add_control(
            'image_2',
            [
                'label'   => esc_html__( 'Image 2', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
            ]
        ); 
        $this->add_control(
            'image_3',
            [
                'label'   => esc_html__( 'Image 3', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
            ]
        ); 
        $this->add_control(
            'years',
            [
                'label'       => __( 'Years:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your years', 'bdevs-elementor' ),
                'default'     => __( '12', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );        
        $this->add_control(
            'after_years',
            [
                'label'       => __( 'Text After Years:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your text', 'bdevs-elementor' ),
                'default'     => __( 'Successful Years', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_title',
            [
                'label'       => __( 'About Title:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
                'default'     => __( 'About Me', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text',
            [
                'label'       => __( 'Text:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your text', 'bdevs-elementor' ),
                'default'     => __( 'This is text ', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Lists', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Name' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'detail',
                        'label'       => esc_html__( 'Detail:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Alan Walker' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->add_control(
            'link_cv',
            [
                'label'       => __( 'Link CV:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your link', 'bdevs-elementor' ),
                'default'     => __( '#', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'download_button',
            [
                'label'       => __( 'Download Button:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your button', 'bdevs-elementor' ),
                'default'     => __( 'Download CV', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        /** 
        *   Layout section 
        **/
        $this->start_controls_section(
            'section_content_layout',
            [
                'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'description'  => 'Use align to match position',
                'default'      => 'left',
            ]
        );
        $this->add_control(
            'show_heading',
            [
                'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

    }

    public function render() {
    $settings  = $this->get_settings_for_display();
    extract($settings); ?>
    <div class="foliox_tm_section" id="about">
        <div class="foliox_tm_about">
            <div class="container">
                <?php if ( $settings['show_heading'] ) : ?>
                <div class="foliox_tm_main_title">
                    <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                    <span><?php print wp_kses_post($settings['subheading']); ?></span>
                    <?php } ?>
                    <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                    <h3><?php print wp_kses_post($settings['heading']); ?></h3>
                    <?php } ?>
                </div>
                <?php endif; ?>
                <div class="wrapper">
                    <div class="left">
                        <div class="big_image">
                            <?php if(isset($settings['image_1']['url']) && $settings['image_1']['url'] != ''){?>
                            <img class="tilt-effect" src="<?php echo wp_kses_post($settings['image_1']['url']); ?>" alt="" />
                            <?php } ?>
                            <?php if(isset($settings['image_2']['url']) && $settings['image_2']['url'] != ''){?>
                            <div class="small_image">
                                <div class="in">
                                    <img src="<?php echo get_template_directory_uri();?>/img/thumbs/1-1.jpg" alt="" />
                                    <?php if (is_admin()) { ?>
                                    <div class="main tilt-effect" data-img-url="<?php echo wp_kses_post($settings['image_2']['url']); ?>" style="background-image:url(<?php echo wp_kses_post($settings['image_2']['url']); ?>);"></div>
                                    <?php } else { ?>
                                    <div class="main tilt-effect" data-img-url="<?php echo wp_kses_post($settings['image_2']['url']); ?>"></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(isset($settings['image_3']['url']) && $settings['image_3']['url'] != ''){?>
                            <span class="badge"><img class="svg" src="<?php echo wp_kses_post($settings['image_3']['url']); ?>" alt="" /></span>
                            <?php } ?>
                            <?php if(isset($settings['years']) && $settings['years'] != ''){?>
                            <div class="experience">
                                <div class="inner">
                                    <h3><?php print wp_kses_post($settings['years']); ?></h3>
                                    <span><?php print wp_kses_post($settings['after_years']); ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="right">
                        <?php if(isset($settings['about_title']) && $settings['about_title'] != ''){?>
                        <h3 class="title"><?php print wp_kses_post($settings['about_title']); ?></h3>
                        <?php } ?>
                         <?php if(isset($settings['text']) && $settings['text'] != ''){?>
                        <p class="text"><?php print wp_kses_post($settings['text']); ?></p>
                        <?php } ?>
                        <div class="list">
                            <ul>
                                <li>
                                    <ul class="item">
                                        <?php 
                                        $i=0;
                                        foreach ( $settings['tabs'] as $item ) : 
                                        $i++;
                                        ?>
                                        <?php if($i%2==1){ ?>
                                        <li>
                                            <?php if(isset($item['title']) && $item['title'] != ''){?>
                                            <span><?php print wp_kses_post($item['title']); ?></span>
                                            <?php } ?>
                                            <?php if(isset($item['detail']) && $item['detail'] != ''){?>
                                            <p><?php print wp_kses_post($item['detail']); ?></p>
                                            <?php } ?>
                                        </li>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="item">
                                        <?php 
                                        $j=0;
                                        foreach ( $settings['tabs'] as $item ) : 
                                        $j++;
                                        ?>
                                        <?php if($j%2==0){ ?>
                                        <li>
                                            <?php if(isset($item['title']) && $item['title'] != ''){?>
                                            <span><?php print wp_kses_post($item['title']); ?></span>
                                            <?php } ?>
                                            <?php if(isset($item['detail']) && $item['detail'] != ''){?>
                                            <p><?php print wp_kses_post($item['detail']); ?></p>
                                            <?php } ?>
                                        </li>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php if(isset($settings['link_cv']) && $settings['link_cv'] != ''){?>
                        <div class="foliox_tm_button">
                            <a href="<?php print wp_kses_post($settings['link_cv']); ?>" download><span><?php print wp_kses_post($settings['download_button']); ?></span></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}



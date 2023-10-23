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
class BdevsBlog extends \Elementor\Widget_Base {

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
        return 'bdevs-blog';
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
        return __( 'Blog', 'bdevs-elementor' );
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
        return 'eicon-post-list';
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
        return [ 'blog' ];
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
                'label' => esc_html__( 'Blog', 'bdevs-elementor' ),
            ]   
        ); 
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
                'default'     => __( 'Blog', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'Latest Blog Posts', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label'       => __( 'Posts Per Page:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your posts per page', 'bdevs-elementor' ),
                'default'     => __( '3', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sortby',
            [
                'label'     => esc_html__( 'Sort', 'bdevs-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'sortby_style_1'  => esc_html__( 'Newest', 'bdevs-elementor' ),
                    'sortby_style_2'  => esc_html__( 'Oldest', 'bdevs-elementor' ),
                ],
                'default'   => 'sortby_style_1',
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
        extract($settings); 
        if ($settings['sortby']=='sortby_style_1') {
            $sortby = 'DESC';
        }
        if ($settings['sortby']=='sortby_style_2') {
            $sortby = 'ASC';
        }
        ?>
        <div class="foliox_tm_section" id="blog">
            <div class="foliox_tm_news">
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
                    <div class="news_list">
                        <ul>
                            <?php
                            $posts_per_page = $settings['posts_per_page'];
                            $wp_query = new \WP_Query(array('posts_per_page' => $posts_per_page,'post_type' => 'post',  'orderby' => 'ID', 'order' => $sortby));     
                            $args = new \WP_Query(array(   
                                        'post_type' => 'post', 
                                    )); 
                            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                            ?>
                            <?php 
                            $cates = get_the_terms(get_the_ID(),'category'); 
                            $cate_name = '';  
                            foreach( (array)$cates as $cate){
                                $cate_name .= $cate->name .' ';
                            }
                            ?>
                            <li class="wow fadeInUp" data-wow-duration="1s">
                                <div class="list_inner tilt-effect">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                    <div class="image">
                                        <img src="<?php echo get_template_directory_uri();?>/img/thumbs/42-29.jpg" alt="" />
                                        <?php if (is_admin()) { ?>
                                        <div class="main" data-img-url="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>);"></div>
                                        <?php } else { ?>
                                        <div class="main" data-img-url="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"></div>
                                        <?php } ?>
                                        <a class="foliox_tm_full_link" href="#"></a>
                                    </div>
                                    <?php } ?>
                                    <div class="details">
                                        <div class="meta">
                                            <p><a href="#"><?php echo esc_attr($cate_name);?></a> <?php the_time(get_option( 'date_format' ));?></p>
                                        </div>
                                        <div class="title">
                                            <h3><a href="#"><?php the_title(); ?></a></h3>
                                        </div>
                                    </div>    
                                    <!-- Popup Content Start -->
                                    <div class="news_hidden_details">
                                        <div class="news_popup_informations">
                                            <div class="text">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Popup Content End --> 
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

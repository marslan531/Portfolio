<?php
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class foliox_widget_newss extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_news', 'description' => esc_html__( "The most recent posts on your site", 'foliox') );
        parent::__construct('recent-posts', esc_html__('Foliox Recent Posts', 'foliox'), $widget_ops);
        $this->alt_option_name = 'widget_news';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('foliox_widget_newss', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( '', 'foliox' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <?php if ( $title ) echo wp_specialchars_decode(esc_attr($before_title),ENT_QUOTES) . esc_attr($title) . wp_specialchars_decode(esc_attr($after_title),ENT_QUOTES); ?>
            <div class="list_inner aon-farm-blog-2 aon-lt-news">
                <div class="posts_list post-recent">
                    <ul>
                        <div class="widget widget_news" id="recent-posts-2">  
                            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                            <li>
                                <div class="list_inner">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                    <a href="<?php the_permalink() ?>">
                                        <div class="image">
                                            <div class="main" data-img-url="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>);"></div> 
                                        </div>
                                    </a>
                                    <?php } ?>
                                    <div class="details">
                                        <span class="date"><?php the_time(get_option( 'date_format' ));?></span>
                                        <h6 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </div>
                    </ul>
                </div>
            </div>         
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('foliox_widget_newss', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_news']) )
            delete_option('widget_news');

        return $instance;
    }


    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'foliox' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'foliox' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'foliox' ); ?></label></p>
<?php
    }
}
class foliox_widget_search extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_search', 'description' => esc_html__( "Search on your site", 'foliox') );
        parent::__construct('search', esc_html__('Foliox Search', 'foliox'), $widget_ops);
        $this->alt_option_name = 'widget_search';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('foliox_widget_search', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }

        ob_start();
        extract($args);

        $s_title = ( ! empty( $instance['s_title'] ) ) ? $instance['s_title'] : esc_html__( 'Search', 'foliox' );
        $s_title = apply_filters( 'widget_title', $s_title, $instance, $this->id_base );

        ?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <form role="search" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
            <label for="wp-block-search__input-1" class="wp-block-search__label">Search</label>
            <div class="wp-block-search__inside-wrapper ">
                <input type="search" id="wp-block-search__input-1" class="wp-block-search__input wp-block-search__input" name="s" placeholder="<?php echo esc_attr__('Search...', 'foliox' );?>">
                <button type="submit" class="wp-block-search__button wp-element-button">Search</button>
            </div>
        </form>
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
   

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('foliox_widget_search', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['s_title'] = strip_tags($new_instance['s_title']);

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_search']) )
            delete_option('widget_search');

        return $instance;
    }

    function form( $instance ) {
        $s_title     = isset( $instance['s_title'] ) ? esc_attr( $instance['s_title'] ) : '';
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 's_title' )); ?>"><?php esc_html_e( 'Title:', 'foliox' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 's_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 's_title' )); ?>" type="text" value="<?php echo esc_attr($s_title); ?>" /></p>

      
<?php
    }
}
function foliox_register_custom_widgets() {
    register_widget( 'foliox_widget_search' );
    register_widget( 'foliox_widget_newss' );
}
add_action( 'widgets_init', 'foliox_register_custom_widgets' );    
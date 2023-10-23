<?php
$foliox_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';

//Theme Set up:
function foliox_theme_setup() {
  /*
   * This theme uses a custom image size for featured images, displayed on
   * "standard" posts and pages.
   */
  add_theme_support( 'custom-header' ); 
  add_theme_support( 'custom-background' );
  $lang = get_template_directory_uri() . '/languages';
  load_theme_textdomain('foliox', $lang);

  add_theme_support( 'post-thumbnails' );
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );
  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Navigation Menu: Chosen menu in single, blog, pages ...', 'foliox' ),
    'primary_onepage' =>  esc_html__( 'Primary Onepage Navigation Menu: Chosen menu in Home page', 'foliox' ),
  ) );
  // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'foliox_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
 
function foliox_theme_scripts_styles() {
  $foliox_redux_demo = get_option('redux_demo');
  $protocol = is_ssl() ? 'https' : 'http';
  wp_enqueue_style('googlefonts-1', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet', array(), null );
  wp_enqueue_style('googlefonts-2', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet', array(), null );
  wp_enqueue_style('foliox-plugins', get_template_directory_uri().'/css/plugins.css');
  wp_enqueue_style('foliox-css', get_template_directory_uri().'/css/style.css');
  wp_enqueue_style('foliox-style', get_stylesheet_uri(), array(), '2023-04-10' );
  if(isset($foliox_redux_demo['chosen-color']) && $foliox_redux_demo['chosen-color']==1){
    wp_enqueue_style('color', get_template_directory_uri().'/framework/color.php');
  }  
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
  wp_enqueue_script('comment-reply');
  
  //Javascript 
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script('jquery-3.6.0', get_template_directory_uri().'/js/jquery.js',array(),false,true);
  //wp_enqueue_script('ie8', get_template_directory_uri().'/js/ie8.js',array(),false,true);
  wp_enqueue_script('foliox-plugins', get_template_directory_uri().'/js/plugins.js',array(),false,true);
  wp_enqueue_script('foliox-init', get_template_directory_uri().'/js/init.js',array(),false,true);
}
add_action( 'wp_enqueue_scripts', 'foliox_theme_scripts_styles' );

//Custom Excerpt Function
function foliox_do_shortcode($content) {
  global $shortcode_tags;
  if (empty($shortcode_tags) || !is_array($shortcode_tags))
      return $content;
  $pattern = get_shortcode_regex();
  return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}

add_filter('user_contactmethods', 'my_user_contactmethods');  
               
function my_user_contactmethods($user_contactmethods){    
  $user_contactmethods['facebook'] = 'Facebook Link';  
  $user_contactmethods['twitter'] = 'Twitter Link';
  $user_contactmethods['instagram'] = 'Instagram Link';   
  $user_contactmethods['behance'] = 'Behance Link';   
  $user_contactmethods['linkedin'] = 'Linkedin Link';   
  return $user_contactmethods;  
}  
// Widget Sidebar
function foliox_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar 1', 'foliox' ),
    'id'            => 'sidebar-1',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'foliox' ),        
    'before_widget' => '<div id=" %1$s" class="widget_block %2$s">',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h2 class="aon-title">',        
    'after_title'   => '</h2>',
    ) ); 
    register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Instagram', 'foliox' ),
    'id'            => 'sidebar-2',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'foliox' ),        
    'before_widget' => '<div id=" %1$s" class="widget_block %2$s">',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h2 class="aon-title">',        
    'after_title'   => '</h2>',
    ) ); 
}
add_action( 'widgets_init', 'foliox_widgets_init' );

//function tag widgets
function foliox_tag_cloud_widget($args) {
  $args['number'] = 0; //adding a 0 will display all tags
  $args['largest'] = 18; //largest tag
  $args['smallest'] = 11; //smallest tag
  $args['unit'] = 'px'; //tag font unit
  $args['format'] = 'list'; //ul with a class of wp-tag-cloud
  $args['exclude'] = array(20, 80, 92); //exclude tags by ID
  return $args;
}
add_filter( 'widget_tag_cloud_args', 'foliox_tag_cloud_widget' );
function foliox_excerpt() {
  $foliox_redux_demo = get_option('redux_demo');
  if(isset($foliox_redux_demo['blog_excerpt'])){
    $limit = $foliox_redux_demo['blog_excerpt'];
  }else{
    $limit = 50;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function foliox_excerpt_2() {
  $foliox_redux_demo = get_option('redux_demo');
  if(isset($foliox_redux_demo['t_l_sidebar_excerpt'])){
    $limit = $foliox_redux_demo['t_l_sidebar_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
//pagination
function foliox_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $paged; // current page
    if(empty($paged)) $paged = 1;
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
         $pages = 1;
    }
    if($pages != 1){
        echo '<div class="site-pagination2">
          <ul class="pagination">';
          if($paged >= 1) echo '<li class="page-item"><a class="page-link prev" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous"><span>0</span></a></li>';
          for($page = 1; $page <= $pages; $page++){
          echo  $page == $paged ? '<li class="page-item active"><a class="page-link" href="#">'. $page. '</a></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
          }
          if($paged <= $pages) echo '<li class="page-item"><a class="page-link next" href="'.get_pagenum_link($paged + 1).'" aria-label="Next"><span>0</span></a></li>';  
        echo "</ul>
            </div>\n";
    }
}
function foliox_search_form( $form ) {
  $form = '
  <form class="search-form"  method="get" action="' . esc_url(home_url('/')) . '"> 
    <input type="search" class="form-control" placeholder="'.esc_attr__('Search', 'foliox').'" value="' . get_search_query() . '" name="s"> 
    <button type="submit"></button>
  </form>';
  return $form;
}
add_filter( 'get_search_form', 'foliox_search_form' );
//Custom comment List:

// Comment Form
function foliox_theme_comment($comment, $args, $depth) {
  //echo 's';
  $GLOBALS['comment'] = $comment; ?>
  <?php if(get_avatar($comment,$size='80' )!=''){?>
  <li class="comment">
    <div class="comment-body">
      <?php echo get_avatar($comment,$size='80' ); ?>
      <div class="comment-info">
        <cite class="fn"><?php printf( esc_html__('%s','foliox'), get_comment_author_link()) ?></cite>
        <br>
        <span class="comment-date"><i class="fa fa-calendar"></i> <?php the_time(get_option( 'date_format' ));?></span>
        <?php comment_text() ?>
      </div>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
  </li>                                                             
  <?php }else{?>
  <li class="comment">
    <div class="comment-body">
      <div class="comment-author">
        <cite class="fn"><?php printf( esc_html__('%s','foliox'), get_comment_author_link()) ?></cite>
        <br>
        <span class="comment-date"><i class="fa fa-calendar"></i> <?php the_time(get_option( 'date_format' ));?></span>
      </div>
      <?php comment_text() ?>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
  </li>  
  <?php }?>
<?php
}
function move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom');

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'foliox_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
function foliox_theme_register_required_plugins() {
  /**
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(
    // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(
            'name'      => esc_html__( 'One Click Demo Import', 'foliox' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'foliox' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'foliox' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'foliox' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'foliox' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'SVG Support', 'foliox' ),
            'slug'      => 'svg-support',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'foliox' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'foliox' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Foliox Common', 'foliox' ),
            'slug'                     => 'foliox-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/foliox-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Foliox Elementor', 'foliox' ),
            'slug'                     => 'foliox-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/foliox-elementor.zip',
        ),
  );
  /**
   * Array of configuration settings. Amend each line as needed.
   * If you want the default strings to be available under your own theme domain,
   * leave the strings uncommented.
   * Some of the strings are added into a sprintf, so see the comments at the
   * end of each line for what each argument will be.
   */
  $config = array(
    'default_path' => '',                      // Default absolute path to pre-packaged plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
    'strings'      => array(
      'page_title'                      => esc_html__( 'Install Required Plugins', 'foliox' ),
      'menu_title'                      => esc_html__( 'Install Plugins', 'foliox' ),
      'installing'                      => esc_html__( 'Installing Plugin: %s', 'foliox' ), // %s = plugin name.
      'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'foliox' ),
      'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'foliox' ), // %1$s = plugin name(s).
      'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'foliox' ), // %1$s = plugin name(s).
      'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'foliox' ), // %1$s = plugin name(s).
      'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'foliox' ), // %1$s = plugin name(s).
      'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'foliox' ), // %1$s = plugin name(s).
      'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'foliox' ), // %1$s = plugin name(s).
      'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its lafoliox version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their lafoliox version to ensure maximum compatibility with this theme: %1$s.', 'foliox' ), // %1$s = plugin name(s).
      'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'foliox' ), // %1$s = plugin name(s).
      'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'foliox' ),
      'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'foliox' ),
      'return'                          => esc_html__( 'Return to Required Plugins Installer', 'foliox' ),
      'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'foliox' ),
      'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'foliox' ), // %s = dashboard link.
      'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
    )
  );
  tgmpa( $plugins, $config );
}
?>
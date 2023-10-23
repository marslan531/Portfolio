<?php

add_action( 'init', 'register_foliox_portfolio' );
function register_foliox_portfolio() {
    
$labels = array( 
'name' => __( 'Portfolio', 'foliox' ),
'singular_name' => __( 'Portfolio', 'foliox' ),
'add_new' => __( 'Add New Portfolio', 'foliox' ),
'add_new_item' => __( 'Add New Portfolio', 'foliox' ),
'edit_item' => __( 'Edit Portfolio', 'foliox' ),
'new_item' => __( 'New Portfolio', 'foliox' ),
'view_item' => __( 'View Portfolio', 'foliox' ),
'search_items' => __( 'Search Portfolio', 'foliox' ),
'not_found' => __( 'No Portfolio found', 'foliox' ),
'not_found_in_trash' => __( 'No Portfolio found in Trash', 'foliox' ),
'parent_item_colon' => __( 'Parent Portfolio:', 'foliox' ),
'menu_name' => __( 'Portfolio', 'foliox' ),
);

$args = array( 
'labels' => $labels,
'hierarchical' => true,
'description' => 'List Portfolio',
'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
'taxonomies' => array( 'portfolio', 'type1' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,
'menu_icon' => 'dashicons-id-alt', 
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'portfolio', $args );
}
add_action( 'init', 'create_type1_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Type1_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

$labels = array(
'name' => __( 'Type', 'foliox' ),
'singular_name' => __( 'Type', 'foliox' ),
'search_items' =>  __( 'Search Type','foliox' ),
'all_items' => __( 'All Type','foliox' ),
    'parent_item' => __( 'Parent Type','foliox' ),
    'parent_item_colon' => __( 'Parent Type:','foliox' ),
    'edit_item' => __( 'Edit Type','foliox' ), 
    'update_item' => __( 'Update Type','foliox' ),
    'add_new_item' => __( 'Add New Type','foliox' ),
    'new_item_name' => __( 'New Type Name','foliox' ),
    'menu_name' => __( 'Type','foliox' ),
  );     

// Now register the taxonomy

  register_taxonomy('type1',array('portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type1' ),
  ));

}



?>
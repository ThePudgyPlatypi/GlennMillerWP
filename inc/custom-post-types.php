<?php /*
* Creating a function to create our CPT
*/
 
function custom_post_type_content() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Contents', 'Post Type General Name', 'Glenn_Miller_Associates' ),
        'singular_name'       => _x( 'Content', 'Post Type Singular Name', 'Glenn_Miller_Associates' ),
        'menu_name'           => __( 'Contents', 'Glenn_Miller_Associates' ),
        'parent_item_colon'   => __( 'Parent Content', 'Glenn_Miller_Associates' ),
        'all_items'           => __( 'All Contents', 'Glenn_Miller_Associates' ),
        'view_item'           => __( 'View Content', 'Glenn_Miller_Associates' ),
        'add_new_item'        => __( 'Add New Content', 'Glenn_Miller_Associates' ),
        'add_new'             => __( 'Add New', 'Glenn_Miller_Associates' ),
        'edit_item'           => __( 'Edit Content', 'Glenn_Miller_Associates' ),
        'update_item'         => __( 'Update Content', 'Glenn_Miller_Associates' ),
        'search_items'        => __( 'Search Content', 'Glenn_Miller_Associates' ),
        'not_found'           => __( 'Not Found', 'Glenn_Miller_Associates' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Glenn_Miller_Associates' ),
    );
     
// Set other options for Custom Post Type
     
    $args1 = array(
        'label'               => __( 'Contents', 'Glenn_Miller_Associates' ),
        'description'         => __( 'Content of the website', 'Glenn_Miller_Associates' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'taxonomies', 'post-formats'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'page_content', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'contents', $args1 );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type_content', 0 );
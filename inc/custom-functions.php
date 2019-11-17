<?php

// Add the custom columns to the content post type:
add_filter( 'manage_contents_posts_columns', 'set_custom_edit_contents_columns' );
function set_custom_edit_contents_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['comments'] );
    $columns['order'] = __( 'Order', 'Glenn_Miller_Associates' );
    $columns['page'] = __( 'Page', 'Glenn_Miller_Associates' );
    $columns['template'] = __( 'Template', 'Glenn_Miller_Associates' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_contents_posts_custom_column' , 'custom_contents_column', 10, 2 );
function custom_contents_column( $column, $post_id ) {
    if ( 'order' === $column ) {
        echo get_post_meta( $post_id , 'order' , true );
    }

    if ( 'page' === $column ) {
        echo get_post_meta( $post_id , 'page' , true );
    }

    if ( 'template' === $column ) {
        echo get_post_meta( $post_id , 'template' , true );
    }
}

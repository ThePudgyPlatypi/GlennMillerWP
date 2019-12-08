<?php

// Add the custom columns to the content post type:
add_filter( 'manage_contents_posts_columns', 'set_custom_edit_contents_columns' );
function set_custom_edit_contents_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['comments'] );
    $columns['order'] = __( 'Order', 'Glenn_Miller_Associates' );
    $columns['page'] = __( 'Page', 'Glenn_Miller_Associates' );
    $columns['template'] = __( 'Template', 'Glenn_Miller_Associates' );
    $columns['card'] = __( 'Card Grid', 'Glenn_Miller_Associates' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_contents_posts_custom_column' , 'custom_contents_column', 10, 2 );
function custom_contents_column( $column, $post_id ) {
    if ( 'order' === $column ) {
        post_meta_default_column_value('order', $post_id);
    }

    if ( 'page' === $column ) {
        post_meta_default_column_value('page', $post_id);
    }

    if ( 'template' === $column ) {
        post_meta_default_column_value('template', $post_id);
    }

    if ( 'card' === $column ) {
        post_meta_default_column_value('card', $post_id);
    }
}

function post_meta_default_column_value($value, $post_id) {
    $x = get_post_meta( $post_id , $value , true );
        if ($x == '') {
            echo 'x';
        } else {
            echo $x;
        }
}


/**
 * Change the excerpt more string
 */
add_filter( 'excerpt_more', '__return_empty_string' );
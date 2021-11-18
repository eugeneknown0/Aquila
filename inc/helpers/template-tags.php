<?php


function get_post_custom_thumbnail ( $post_id, $size = 'featured-image', $add_attr = [] ) {
    $custom_thumbnail = '';

    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    if ( has_post_thumbnail( $post_id ) ) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attr = array_merge( $add_attr, $default_attributes );

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $add_attr
        );
    }

    return $custom_thumbnail;
}

function post_custom_thumbnail( $post_id, $size = 'featured-image', $add_attr = [] ) {
    echo get_post_custom_thumbnail( $post_id, $size, $add_attr );
}
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

function aquila_posted_on() {
    $time_str = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' )  ) {
        $time_str = '<time class="entry-date published" datetime="%1$s">%2$s </time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_str = sprintf( $time_str,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'aquila' ),
        '<a href="' .esc_url( get_permalink() ). '" rel="bookmark">' .$time_str. '</a>'
    );

    echo '<span class="posted-on text-secondary">'. $posted_on .'</span>';
}

function aquila_posted_by() {
    $byline = sprintf(
        esc_html_x( ' by %s', 'post author', 'aquila' ),
        '<span class="author vcard"><a href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
         .'">'. esc_html( get_the_author() ) .'</a></span>'
    );

    echo '<span class="byline text-secondary">'. $byline .'</span>';
}

function aquila_excerpt( $trim_char_count = 0 ) {
    if ( ! has_excerpt() || 0 === $trim_char_count ) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags( get_the_excerpt() );
    $excerpt = substr( $excerpt, 0 , $trim_char_count );
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );

    echo $excerpt . '[...]';
}

function  aquila_excerpt_more( $more = '' ) {
    if ( ! is_single() ) {
        $more = sprintf(
            '<button class="mt-4 btn btn-info"><a class="aquila-read-more text-white" href="%1$s">%2$s</a></button>',
            get_permalink( get_the_ID() ),
            __( 'Read more', 'aquila' )
        );
    }

    return $more;
}

function aquila_pagination() {
    $allow_tags = [
        'span' => [
            'class' => []
        ],
        'a' => [
            'class' => [],
            'href' => []
        ]
    ];

    $args = [
        'before_page_number' => '<span class="btn border-secondary mr-2 mb-2">',
        'after_page_number' => '</span>'
    ];

    printf( '<nav class="auiqla-pagination clearfix">%s</nav>', wp_kses( paginate_links( $args ), $allow_tags ) );
}
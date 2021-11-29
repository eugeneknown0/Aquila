<?php

$post_id = get_the_ID();
$hide_title = get_post_meta( $post_id, '_hide_page_title', true );
$heading_class = ! empty( $hide_title ) && 'yes' === $hide_title ? 'hide' : '';
$has_post_thumbnail = get_the_post_thumbnail( $post_id );
?>

<header class='entry-header'>
    <?php
        if ( $has_post_thumbnail ) {
            ?>
                <div class='entry-image mb-3'>
                    <a href='<?php echo esc_url( get_permalink() ); ?>'>
                        <?php
                            post_custom_thumbnail(
                                $post_id,
                                'featured-large',
                                [
                                    'sizes' => '(max-width: 590px) 590px, 425px',
                                    'class' => 'attachment-featured-large size-featured-image'
                                ]
                            );
                        ?>
                    </a>
                </div>
            <?php
        }

        if ( is_single() || is_page() ) {
            printf(
                '<h1 class="page-title text-dark %1$s">%2$s</h1>',
                esc_attr( $heading_class ),
                wp_kses_post( get_the_title() )
            );
        } else {
            printf(
                '<h2 class="entry-title mb-3"><a href="%1$s" class="text-dark">%2$s</a></h2>',
                esc_url( get_permalink() ),
                wp_kses_post( get_the_title() )
            );
        }
    ?>
</header>
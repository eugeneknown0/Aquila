<?php

$post_id = get_the_ID();
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
    ?>
</header>
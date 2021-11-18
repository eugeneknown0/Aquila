

<section class='no-result not-found'>
    <header class='page-header'>
        <h1 class='page-title'><?php esc_html_e( 'Nothing Found', 'aquila' ); ?></h1>
    </header>

    <div class='page-content'>
        <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) {
                ?>
                    <p>
                        <?php 
                            printf(
                                wp_kses(
                                    __( 'Ready to publish? <a href="%s">Get started here</a>', 'aquila' ),
                                    [
                                        'a' => [
                                            'href' => []
                                        ]
                                    ]
                                ),
                                esc_url( admin_url( 'post-new.php' ) )
                            );
                        ?>
                    </p>
                <?php
            } elseif ( is_search() ) {
                ?>
                    <p><?php esc_html_e( 'Search item not match, please ty again', 'aquila' ) ?></p>
                <?php
                get_search_form();
            } else {
                ?>
                    <p><?php esc_html_e( 'Item not found', 'aquila' ) ?></p>
                <?php
                get_search_form();
            }
        ?>
    </div>
</section>
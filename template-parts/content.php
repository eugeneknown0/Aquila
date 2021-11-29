<?php 
/**
 * Content Template.
 * 
 * @package aquila
 */
?>

<article>
    <?php 
        get_template_part( 'template-parts/components/blog/entry-header' );
        get_template_part( 'template-parts/components/blog/entry-meta' );
        get_template_part( 'template-parts/components/blog/entry-content' );
        get_template_part( 'template-parts/components/blog/entry-footer' );
    ?>
</article>
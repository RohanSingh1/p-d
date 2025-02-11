<?php
/**
 * Job Listing Block
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
*/
$content    = get_field('content');
if( !$content ){
    return false;
}
?>
<section class="pd-content-block pd-content--narrow">
    <div class="container">
        <?php echo $content; ?>
    </div> <!-- .container -->
</section>
<?php 
/**
 * Default Banner Block
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
*/
$banner_image = (get_field('banner_image')) ? get_field('banner_image') : (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : PND_ASSETS_URI . 'images/banner.png');
$banner_subtitle = get_field('banner_subtitle');
$banner_title = (get_field('banner_title')) ? get_field('banner_title') : get_the_title();
$banner_description = get_field('banner_description');
?>
<section class="pd-pagebanner" style="background-image: url('<?php echo $banner_image;?>');">
    <div class="container">
        <div class="pd-pagebanner-content">
            <?php if( $banner_subtitle ): ?>
            <h4 class="pd-pagebanner-content__subtitle"><?php echo $banner_subtitle;?></h4>
            <?php endif;?>
            <?php if( $banner_title ): ?>
            <h1 class="pd-pagebanner-content__title"><?php echo $banner_title;?></h1>
            <?php endif;
            ?>
            <?php if( $banner_description ): ?>
            <div class="pd-pagebanner-content__desc"><?php echo $banner_description;?></div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php 
global $post;
$banner_image = get_field('banner_image');
$banner_description = get_field('banner_description');
$banner_cta = get_field('banner_cta');
$banner_button = get_field('banner_button');
$social_link = get_field('social_link');
$brand_image = get_field('brand_image', $post->ID);
$venue_name = get_the_title( $post );
$image_lists=  get_field('banner_image_slider');
?>
<section class="pd-venue-banner">
    <div class="pd-venue-banner-content-wrap">
        <div class="pd-venue-banner-content">
            <?php if( $brand_image ): ?>
                <img src="<?php echo $brand_image;?>" class="pd-venue-banner-content__image" alt="<?php echo $venue_name;?>"/>
            <?php endif;
            if( $banner_description ): ?>
                <div class="pd-venue-banner-content__desc"><?php echo $banner_description;?></div>
            <?php endif;?>
            <div class="pd-venue-book-wrap">
                <?php pd_acf_link($banner_button, 'pd_button pd_button_bg--transparent pd-venue-book'); // function to get html for field type link ?>
            </div>
            <?php 
            if( $banner_cta ): ?>
                <div class="pd-venue-banner-content__cta"><?php echo $banner_cta;?></div>
            <?php endif;
            if( !empty( $social_link ) ): ?>
                <div class="pd-venue-banner-content-follow">
                    <span class="pd-venue-banner-content-follow__title">Follow</span>
                    <?php pd_acf_link($social_link);// function to get html for field type link ?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="pd-venue-banner__slider owl-carousel">
        <?php 
        foreach( $image_lists as $image_id ): 
            $img_url = wp_get_attachment_image_url( $image_id, 'full' );
            ?>
            <div class="pd-venue-banner__slider__item" style="background-image: url('<?php echo $img_url;?>');"></div>
        <?php endforeach;?>
    </div>
</section>
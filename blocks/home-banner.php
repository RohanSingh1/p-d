<?php 
$banner_image = get_field('banner_image');
$banner_subtitle = get_field('banner_subtitle');
$banner_title = get_field('banner_title');
$venue_lists = get_field('venue_lists');
$stay_link = get_field('stay_link') ? get_field('stay_link') : array();
?>
<section class="pd-home-banner" style="background-image: url('<?php echo $banner_image;?>');">
    <div class="container">
        <div class="pd-home-banner-top">
            <?php if( $banner_subtitle ): ?>
                <h4 class="pd-home-banner-top__subtitle"><?php echo $banner_subtitle;?></h4>
            <?php endif;?>
            <?php if( $banner_title ): ?>
                <h1 class="pd-home-banner-top__title"><?php echo $banner_title;?></h1>
            <?php endif;
            // pd_acf_link($banner_button); // function to get html for field type link
            // pd_acf_link($social_link);// function to get html for field type link
            ?>
        </div>
        <div class="pd-home-banner-bottom">
            <?php 
            if( is_array( $venue_lists ) ): ?>
            <div class="pd-home-banner-bottom-col dine-list">
                <h4 class="type-title">Dine</h4>
                <ul>
                    <?php 
                        foreach( $venue_lists as $venue_id ):
                            if( get_post_type( $venue_id ) !== false ): ?>
                            <li>
                                <a href="<?php echo get_the_permalink( $venue_id );?>" class="pd-link-animate pd-link--white">
                                    <?php echo get_the_title( $venue_id );?>
                                </a>
                            </li>
                            <?php
                            endif;
                        endforeach;?>
                </ul>
            </div>
            <?php endif;
            if( !empty( $stay_link ) ):?>
                <div class="pd-home-banner-bottom-col stay-list">
                    <h4 class="type-title">Stay</h4>
                    <div class="pd-home-banner__staylink"><a href="<?php echo  $stay_link['link_url'];?>"><?php echo  $stay_link['text'];?></a></div>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="scroll-down-wrapper"><span class="scroll-down"></span></div>
</section>